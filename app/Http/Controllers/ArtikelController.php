<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    public function inputartikel()
    {
        $user = User::all();
        return view('crud.input-artikel', compact('user'));
    }

    public function uploadartikel(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_artikel' => 'required|max:100',
            'judul_artikel' => 'required|max:100',
            'gambar_artikel' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_artikel' => 'required',
        ], $pesan);

        $nomor = "ART".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Artikel::where('artikel_no',$nomor)->exists()) 
        {
            $nomor = "ART".mt_rand(100000, 999999);
        }
      
        $file = $request->file('gambar_artikel');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/artikel';
        $file->move($directory,$filename);

        if($request->member_artikel == NULL)
        {
            Artikel::create([
                    'member_id' => Auth::user()->member_id,
                    'artikel_no' => $nomor,
                    'PIC' => $request->pic_artikel,
                    'artikel_judul' => $request->judul_artikel,
                    'artikel_desc' => $request->deskripsi_artikel,
                    'artikel_image' => $filename,
                    'artikel_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Artikel::create([
                    'member_id' => Auth::user()->member_id,
                    'artikel_no' => $nomor,
                    'PIC' => $request->pic_artikel,
                    'artikel_judul' => $request->judul_artikel,
                    'artikel_desc' => $request->deskripsi_artikel,
                    'artikel_member' => implode(", ", $request->member_artikel),
                    'artikel_image' => $filename,
                    'artikel_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-artikel')->with('uploadartikel', 'Data berhasil ditambahkan!');
    }

    public function editartikel($id)
    {
        $artikel = Artikel::where('artikel_id',$id)->first();
        $user = User::all();
        return view('crud.edit-artikel', compact('artikel', 'user'));
    }

    public function updateartikel(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_artikel' => 'required|max:100',
            'judul_artikel' => 'required|max:100',
            'gambar_artikel' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_artikel' => 'required',
        ], $pesan);

        Artikel::where('artikel_id',$id)->update([
                'PIC' => $request->pic_artikel,
                'artikel_judul' => $request->judul_artikel,                       
                'artikel_desc' => $request->deskripsi_artikel,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('gambar_artikel'))
        {
            $file = Artikel::where('artikel_id',$id)->first();
            File::delete('file/gambar/artikel/'.$file->artikel_image);
    
            $file = $request->file('gambar_artikel');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/artikel';
            $file->move($directory,$filename);
        
            Artikel::where('artikel_id',$id)->update(['artikel_image' => $filename]);
        }

        if($request->member_artikel == NULL)
        {
            Artikel::where('artikel_id',$id)->update(['artikel_member' => NULL]);            
        }
        
        else
        {
            Artikel::where('artikel_id',$id)->update(['artikel_member' => implode(", ", $request->member_artikel)]);            
        }

        Artikel::where('artikel_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-artikel')->with('updateartikel', 'Data berhasil diedit!');
    }

    public function hapusartikel($id)
    {
        $file = Artikel::where('artikel_id',$id)->first();
        File::delete('file/gambar/artikel/'.$file->artikel_image);
        Artikel::where('artikel_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-artikel')->with('hapusartikel', 'Data berhasil dihapus!');
    }
}