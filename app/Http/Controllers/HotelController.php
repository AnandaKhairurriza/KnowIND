<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Hotel;

class HotelController extends Controller
{
    public function inputhotel()
    {
        $user = User::all();
        return view('crud.input-hotel', compact('user'));
    }

    public function uploadhotel(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_hotel' => 'required|max:100',
            'gambar_hotel' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_hotel' => 'required',
            'nama_hotel' => 'required',
        ], $pesan);

        $nomor = "HOT".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Hotel::where('hotel_no',$nomor)->exists()) 
        {
            $nomor = "HOT".mt_rand(100000, 999999);
        }
      
        $file = $request->file('gambar_hotel');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/hotel';
        $file->move($directory,$filename);

        if($request->member_hotel == NULL)
        {
            Hotel::create([
                    'member_id' => Auth::user()->member_id,
                    'hotel_no' => $nomor,
                    'PIC' => $request->pic_hotel,
                    'hotel_nama' => $request->nama_hotel,
                    'hotel_alamat' => $request->alamat_hotel,
                    'hotel_desc' => $request->deskripsi_hotel,
                    'hotel_image' => $filename,
                    'hotel_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Hotel::create([
                    'member_id' => Auth::user()->member_id,
                    'hotel_no' => $nomor,
                    'PIC' => $request->pic_hotel,
                    'hotel_nama' => $request->nama_hotel,
                    'hotel_alamat' => $request->alamat_hotel,
                    'hotel_desc' => $request->deskripsi_hotel,
                    'hotel_member' => implode(", ", $request->member_hotel),
                    'hotel_image' => $filename,
                    'hotel_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-hotel')->with('uploadhotel', 'Data berhasil ditambahkan!');
    }

    public function edithotel($id)
    {
        $hotel = Hotel::where('hotel_id',$id)->first();
        $user = User::all();
        return view('crud.edit-hotel', compact('hotel', 'user'));
    }

    public function updatehotel(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_hotel' => 'required|max:100',
            'gambar_hotel' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_hotel' => 'required',
        ], $pesan);

        Hotel::where('hotel_id',$id)->update([
                'PIC' => $request->pic_hotel,              
                'hotel_nama' => $request->nama_hotel,
                'hotel_alamat' => $request->alamat_hotel,         
                'hotel_desc' => $request->deskripsi_hotel,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('gambar_hotel'))
        {
            $file = Hotel::where('hotel_id',$id)->first();
            File::delete('file/gambar/hotel/'.$file->hotel_image);
    
            $file = $request->file('gambar_hotel');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/hotel';
            $file->move($directory,$filename);
        
            Hotel::where('hotel_id',$id)->update(['hotel_image' => $filename]);
        }

        if($request->member_hotel == NULL)
        {
            Hotel::where('hotel_id',$id)->update(['hotel_member' => NULL]);            
        }
        
        else
        {
            Hotel::where('hotel_id',$id)->update(['hotel_member' => implode(", ", $request->member_hotel)]);            
        }

        Hotel::where('hotel_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-hotel')->with('updatehotel', 'Data berhasil diedit!');
    }

    public function hapushotel($id)
    {
        $file = Hotel::where('hotel_id',$id)->first();
        File::delete('file/gambar/hotel/'.$file->hotel_image);
        Hotel::where('hotel_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-hotel')->with('hapushotel', 'Data berhasil dihapus!');
    }
}