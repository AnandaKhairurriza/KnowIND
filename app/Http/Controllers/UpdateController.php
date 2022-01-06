<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Update;

class UpdateController extends Controller
{
    public function inputupdate()
    {
        $area = array('Artikel', 'Podcast', 'Video', 'Event', 'Translator');
        $user = User::all();
        return view('crud.input-update', compact('user', 'area'));
    }

    public function uploadupdate(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_update' => 'required|max:100',
            'gambar_update' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'version_update' => 'required|max:20',
            'nama_update' => 'required|max:100',
            'area_update' => 'required',
            'deskripsi_update' => 'required',
        ], $pesan);

        $nomor = "UPD".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Update::where('update_no',$nomor)->exists()) 
        {
            $nomor = "UPD".mt_rand(100000, 999999);
        }

        if ($request->hasFile('gambar_update')) 
        {
            $file = $request->file('gambar_update');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/update';
            $file->move($directory,$filename);
    
            Update::create([
                    'member_id' => Auth::user()->member_id,
                    'update_no' => $nomor,
                    'PIC' => $request->pic_update,
                    'version_no' => $request->version_update,
                    'update_nama' => $request->nama_update,
                    'update_area' => $request->area_update,
                    'update_desc' => $request->deskripsi_update,
                    'update_image' => $filename,
                    'update_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
        else
        {
            Update::create([
                    'member_id' => Auth::user()->member_id,
                    'update_no' => $nomor,
                    'PIC' => $request->pic_update,
                    'version_no' => $request->version_update,
                    'update_nama' => $request->nama_update,
                    'update_area' => $request->area_update,
                    'update_desc' => $request->deskripsi_update,
                    'update_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);  
        }

        return redirect()->route('manage-database', '#tabel-update')->with('uploadupdate', 'Data berhasil ditambahkan!');
    }

    public function editupdate($id)
    {
        $area = array('Artikel', 'Podcast', 'Video', 'Event', 'Translator');
        $update = Update::where('update_id',$id)->first();
        $user = User::all();
        return view('crud.edit-update', compact('update', 'user', 'area'));
    }

    public function updateupdate(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_update' => 'required|max:100',
            'gambar_update' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'version_update' => 'required|max:20',
            'nama_update' => 'required|max:100',
            'area_update' => 'required',
            'deskripsi_update' => 'required',
        ], $pesan);

        Update::where('update_id',$id)->update([
                'PIC' => $request->pic_update,
                'version_no' => $request->version_update,
                'update_nama' => $request->nama_update,
                'update_area' => $request->area_update,
                'update_desc' => $request->deskripsi_update,
        ]);

        if($request->hasFile('gambar_update'))
        {
            $file = Update::where('update_id',$id)->first();

            if($file->update_image != NULL)
            {
                File::delete('file/gambar/update/'.$file->update_image);
            }
            
            $file = $request->file('gambar_update');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/update';
            $file->move($directory,$filename);
        
            Update::where('update_id',$id)->update(['update_image' => $filename]);
        }

        return redirect()->route('manage-database', '#tabel-update')->with('updateupdate', 'Data berhasil diedit!');
    }

    public function hapusupdate($id)
    {
        $file = Update::where('update_id',$id)->first();
        if ($file->update_image != NULL) 
        {
            File::delete('file/gambar/update/'.$file->update_image);
        }
        
        Update::where('update_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-update')->with('hapusupdate', 'Data berhasil dihapus!');
    }
}