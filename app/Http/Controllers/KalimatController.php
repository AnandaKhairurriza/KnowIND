<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\AsalBahasa;
use App\Models\Kalimat;

class KalimatController extends Controller
{
    public function inputkalimat()
    {
        $user = User::all();
        $asalbahasa = AsalBahasa::all();
        return view('crud.input-kalimat', compact('user', 'asalbahasa'));
    }

    public function uploadkalimat(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'integer' => 'Asal Bahasa harus dipilih!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'asal_bahasa' => 'integer',
            'pic_kalimat' => 'required|max:100',
            'bahasa_daerah' => 'required|max:250',
            'bahasa_indonesia' => 'required|max:250',
            'bahasa_inggris' => 'required|max:250',
        ], $pesan);

        $nomor = "KAL".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Kalimat::where('kalimat_no',$nomor)->exists()) 
        {
            $nomor = "KAL".mt_rand(100000, 999999);
        }

        if($request->member_kalimat == NULL)
        {
            Kalimat::create([
                    'member_id' => Auth::user()->member_id,
                    'asalbahasa_id' => $request->asal_bahasa,
                    'kalimat_no' => $nomor,
                    'PIC' => $request->pic_kalimat,
                    'bahasa_daerah' => $request->bahasa_daerah,
                    'bahasa_indonesia' => $request->bahasa_indonesia,
                    'bahasa_inggris' => $request->bahasa_inggris,
                    'kalimat_member' => "-",
                    'kalimat_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Kalimat::create([
                    'member_id' => Auth::user()->member_id,
                    'asalbahasa_id' => $request->asal_bahasa,
                    'kalimat_no' => $nomor,
                    'PIC' => $request->pic_kalimat,
                    'bahasa_daerah' => $request->bahasa_daerah,
                    'bahasa_indonesia' => $request->bahasa_indonesia,
                    'bahasa_inggris' => $request->bahasa_inggris,
                    'kalimat_member' => implode(", ", $request->member_kalimat),
                    'kalimat_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-kalimat')->with('uploadkalimat', 'Data berhasil ditambahkan!');
    }

    public function editkalimat($id)
    {
        $kalimat = Kalimat::where('kalimat_id',$id)->first();
        $user = User::all();
        $asalbahasa = AsalBahasa::all();
        return view('crud.edit-kalimat', compact('kalimat', 'user', 'asalbahasa'));
    }

    public function updatekalimat(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'integer' => 'Asal Bahasa harus dipilih!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'asal_bahasa' => 'integer',
            'pic_kalimat' => 'required|max:100',
            'bahasa_daerah' => 'required|max:250',
            'bahasa_indonesia' => 'required|max:250',
            'bahasa_inggris' => 'required|max:250',
        ], $pesan);

        Kalimat::where('kalimat_id',$id)->update([
                'asalbahasa_id' => $request->asal_bahasa,
                'PIC' => $request->pic_kalimat,
                'bahasa_daerah' => $request->bahasa_daerah,
                'bahasa_indonesia' => $request->bahasa_indonesia,
                'bahasa_inggris' => $request->bahasa_inggris,
                'kalimat_member' => implode(", ", $request->member_kalimat),                    
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->member_kalimat == NULL)
        {
            Kalimat::where('kalimat_id',$id)->update(['kalimat_member' => "-"]);            
        }
        
        else
        {
            Kalimat::where('kalimat_id',$id)->update(['kalimat_member' => implode(", ", $request->member_kalimat)]);            
        }

        Kalimat::where('kalimat_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-kalimat')->with('updatekalimat', 'Data berhasil diedit!');
    }

    public function hapuskalimat($id)
    {
        Kalimat::where('kalimat_id',$id)->delete();
        return redirect()->route('manage-database', '#tabel-kalimat')->with('hapuskalimat', 'Data berhasil dihapus!');
    }
}