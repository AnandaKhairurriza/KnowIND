<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Wisata;

class WisataController extends Controller
{
    public function inputwisata()
    {
        $user = User::all();
        return view('crud.input-wisata', compact('user'));
    }

    public function uploadwisata(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_wisata' => 'required|max:100',
            'gambar_wisata' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_wisata' => 'required',
            'nama_wisata' => 'required',
        ], $pesan);

        $nomor = "WIS".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Wisata::where('wisata_no',$nomor)->exists()) 
        {
            $nomor = "WIS".mt_rand(100000, 999999);
        }
      
        $file = $request->file('gambar_wisata');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/wisata';
        $file->move($directory,$filename);

        if($request->member_wisata == NULL)
        {
            Wisata::create([
                    'member_id' => Auth::user()->member_id,
                    'wisata_no' => $nomor,
                    'PIC' => $request->pic_wisata,
                    'wisata_nama' => $request->nama_wisata,
                    'wisata_alamat' => $request->alamat_wisata,
                    'wisata_desc' => $request->deskripsi_wisata,
                    'wisata_image' => $filename,
                    'wisata_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Wisata::create([
                    'member_id' => Auth::user()->member_id,
                    'wisata_no' => $nomor,
                    'PIC' => $request->pic_wisata,
                    'wisata_nama' => $request->nama_wisata,
                    'wisata_alamat' => $request->alamat_wisata,
                    'wisata_desc' => $request->deskripsi_wisata,
                    'wisata_member' => implode(", ", $request->member_wisata),
                    'wisata_image' => $filename,
                    'wisata_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-wisata')->with('uploadwisata', 'Data berhasil ditambahkan!');
    }

    public function editwisata($id)
    {
        $wisata = Wisata::where('wisata_id',$id)->first();
        $user = User::all();
        return view('crud.edit-wisata', compact('wisata', 'user'));
    }

    public function updatewisata(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_wisata' => 'required|max:100',
            'gambar_wisata' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_wisata' => 'required',
        ], $pesan);

        Wisata::where('wisata_id',$id)->update([
                'PIC' => $request->pic_wisata,              
                'wisata_nama' => $request->nama_wisata,
                'wisata_alamat' => $request->alamat_wisata,         
                'wisata_desc' => $request->deskripsi_wisata,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('gambar_wisata'))
        {
            $file = Wisata::where('wisata_id',$id)->first();
            File::delete('file/gambar/wisata/'.$file->wisata_image);
    
            $file = $request->file('gambar_wisata');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/wisata';
            $file->move($directory,$filename);
        
            Wisata::where('wisata_id',$id)->update(['wisata_image' => $filename]);
        }

        if($request->member_wisata == NULL)
        {
            Wisata::where('wisata_id',$id)->update(['wisata_member' => NULL]);            
        }
        
        else
        {
            Wisata::where('wisata_id',$id)->update(['wisata_member' => implode(", ", $request->member_wisata)]);            
        }

        Wisata::where('wisata_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-wisata')->with('updatewisata', 'Data berhasil diedit!');
    }

    public function hapuswisata($id)
    {
        $file = Wisata::where('wisata_id',$id)->first();
        File::delete('file/gambar/wisata/'.$file->wisata_image);
        Wisata::where('wisata_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-wisata')->with('hapuswisata', 'Data berhasil dihapus!');
    }
}