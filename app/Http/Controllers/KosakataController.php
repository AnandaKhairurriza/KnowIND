<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\AsalBahasa;
use App\Models\Kosakata;

class KosakataController extends Controller
{
    public function inputkosakata()
    {
        $user = User::all();
        $asalbahasa = AsalBahasa::all();
        return view('crud.input-kosakata', compact('user', 'asalbahasa'));
    }

    public function uploadkosakata(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'integer' => 'Asal Bahasa harus dipilih!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'asal_bahasa' => 'integer',
            'pic_kosakata' => 'required|max:100',
            'bahasa_daerah' => 'required|max:100',
            'bahasa_indonesia' => 'required|max:100',
            'bahasa_inggris' => 'required|max:100',
        ], $pesan);

        $nomor = "KOS".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Kosakata::where('kosakata_no',$nomor)->exists()) 
        {
            $nomor = "KOS".mt_rand(100000, 999999);
        }

        if($request->member_kosakata == NULL)
        {
            Kosakata::create([
                    'member_id' => Auth::user()->member_id,
                    'asalbahasa_id' => $request->asal_bahasa,
                    'kosakata_no' => $nomor,
                    'PIC' => $request->pic_kosakata,
                    'bahasa_daerah' => $request->bahasa_daerah,
                    'bahasa_indonesia' => $request->bahasa_indonesia,
                    'bahasa_inggris' => $request->bahasa_inggris,
                    'kosakata_member' => "-",
                    'kosakata_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Kosakata::create([
                    'member_id' => Auth::user()->member_id,
                    'asalbahasa_id' => $request->asal_bahasa,
                    'kosakata_no' => $nomor,
                    'PIC' => $request->pic_kosakata,
                    'bahasa_daerah' => $request->bahasa_daerah,
                    'bahasa_indonesia' => $request->bahasa_indonesia,
                    'bahasa_inggris' => $request->bahasa_inggris,
                    'kosakata_member' => implode(", ", $request->member_kosakata),
                    'kosakata_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-kosakata')->with('uploadkosakata', 'Data berhasil ditambahkan!');
    }

    public function editkosakata($id)
    {
        $kosakata = Kosakata::where('kosakata_id',$id)->first();
        $user = User::all();
        $asalbahasa = AsalBahasa::all();
        return view('crud.edit-kosakata', compact('kosakata', 'user', 'asalbahasa'));
    }

    public function updatekosakata(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'integer' => 'Asal Bahasa harus dipilih!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'asal_bahasa' => 'integer',
            'pic_kosakata' => 'required|max:100',
            'bahasa_daerah' => 'required|max:100',
            'bahasa_indonesia' => 'required|max:100',
            'bahasa_inggris' => 'required|max:100',
        ], $pesan);

        Kosakata::where('kosakata_id',$id)->update([
                'asalbahasa_id' => $request->asal_bahasa,
                'PIC' => $request->pic_kosakata,
                'bahasa_daerah' => $request->bahasa_daerah,
                'bahasa_indonesia' => $request->bahasa_indonesia,
                'bahasa_inggris' => $request->bahasa_inggris,
                'kosakata_member' => implode(", ", $request->member_kosakata),                    
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->member_kosakata == NULL)
        {
            Kosakata::where('kosakata_id',$id)->update(['kosakata_member' => "-"]);            
        }
        
        else
        {
            Kosakata::where('kosakata_id',$id)->update(['kosakata_member' => implode(", ", $request->member_kosakata)]);            
        }

        Kosakata::where('kosakata_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-kosakata')->with('updatekosakata', 'Data berhasil diedit!');
    }

    public function hapuskosakata($id)
    {
        Kosakata::where('kosakata_id',$id)->delete();
        return redirect()->route('manage-database', '#tabel-kosakata')->with('hapuskosakata', 'Data berhasil dihapus!');
    }
}