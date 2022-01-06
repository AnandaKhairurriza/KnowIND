<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Event;

class EventController extends Controller
{
    public function inputevent()
    {
        $user = User::all();
        return view('crud.input-event', compact('user'));
    }

    public function uploadevent(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_event' => 'required|max:100',
            'mulai_event' => 'required',
            'selesai_event' => 'required',
            'nama_event' => 'required|max:100',
            'gambar_event' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_event' => 'required',
        ], $pesan);

        $nomor = "EVE".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Event::where('event_no',$nomor)->exists()) 
        {
            $nomor = "EVE".mt_rand(100000, 999999);
        }
      
        $file = $request->file('gambar_event');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/event';
        $file->move($directory,$filename);

        Event::create([
                'member_id' => Auth::user()->member_id,
                'PIC' => $request->pic_event,
                'event_no' => $nomor,
                'event_mulai' => $request->mulai_event,
                'event_selesai' => $request->selesai_event,
                'event_nama' => $request->nama_event,
                'event_desc' => $request->deskripsi_event,
                'event_image' => $filename,
                'event_tgl' => Carbon::now()->toDateString(),
                'created_at' => Carbon::now(),
        ]);            

        return redirect()->route('manage-database', '#tabel-event')->with('uploadevent', 'Data berhasil ditambahkan!');
    }

    public function editevent($id)
    {
        $event = Event::where('event_id',$id)->first();
        $user = User::all();
        return view('crud.edit-event', compact('event', 'user'));
    }

    public function updateevent(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_event' => 'required|max:100',
            'mulai_event' => 'required',
            'selesai_event' => 'required',
            'nama_event' => 'required|max:100',
            'gambar_event' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'deskripsi_event' => 'required',
        ], $pesan);

        Event::where('event_id',$id)->update([
                'PIC' => $request->pic_event,
                'event_mulai' => $request->mulai_event,
                'event_selesai' => $request->selesai_event,
                'event_nama' => $request->nama_event,
                'event_desc' => $request->deskripsi_event,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('gambar_event'))
        {
            $file = Event::where('event_id',$id)->first();
            File::delete('file/gambar/event/'.$file->event_image);
    
            $file = $request->file('gambar_event');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/event';
            $file->move($directory,$filename);
        
            Event::where('event_id',$id)->update(['event_image' => $filename]);
        }

        Event::where('event_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-event')->with('updateevent', 'Data berhasil diedit!');
    }

    public function hapusevent($id)
    {
        $file = Event::where('event_id',$id)->first();
        File::delete('file/gambar/event/'.$file->event_image);
        Event::where('event_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-event')->with('hapusevent', 'Data berhasil dihapus!');
    }
}