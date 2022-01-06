<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Rules\SamaPasswordLama;

use Auth;
use File;

use App\User;
use App\Models\Member;
use App\Models\Artikel;
use App\Models\Podcast;
use App\Models\Video;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Wisata;
use App\Models\Kosakata;
use App\Models\Kalimat;
use App\Models\Update;

class KnowINDController extends Controller
{
	public function home()
	{
        $index = 1;
        $event = Event::orderBy('event_mulai', 'desc')->take(2)->get();
        $member = Member::where('type', 'kontributor')->orderBy('created_at', 'desc')->take(10)->get();
        $update = Update::orderBy('created_at', 'desc')->take(5)->get();
		return view ('homepage', compact('index', 'event', 'member', 'update'));
	}

    public function event()
    {
        $event = Event::orderBy('event_mulai', 'desc')->paginate(5);
        return view('event', compact('event'));
    }

    public function eventdetail($id)
    {
        $event = Event::where('event_id', $id)->first();
        return view('event-detail', compact('event'));
    }

    public function listkontributor()
    {
        $index = 1;
        $member= Member::where('type', 'kontributor')->orderBy('created_at', 'desc')->paginate(100);
        return view('list-kontributor', compact('member', 'index'));
    }

    public function donasi()
    {
        return view('donasi');
    }

    public function appupdate()
    {
        $update = Update::orderBy('created_at', 'desc')->paginate(10);

        return view('app-update', compact('update'));
    }

    public function appupdatedetail($id)
    {
        $update = Update::where('update_id', $id)->first();

        return view('app-update-detail', compact('update'));
    }

    public function tentangkami()
    {
        return view('tentang-kami');
    }

    public function managedatabase()
    {
        $artikel = Artikel::all();
        $podcast = Podcast::all();
        $video = Video:: all();
        $event = Event::all();
        $hotel = Hotel::all();
        $wisata = Wisata::all();
        $kosakata = Kosakata::all();
        $kalimat = Kalimat::all();
        $update = Update::all();
        return view('manage-database', compact('artikel', 'podcast', 'video', 'event', 'hotel', 'wisata', 'kosakata', 'kalimat', 'update'));
    }

    public function editakun()
    {
        $id = Auth::user()->member_id;
        $username = Auth::user()->name;
        $email = Auth::user()->email;
        $avatar = Auth::user()->avatar;

        return view('auth.edit-akun', compact('id', 'username', 'email', 'avatar'));
    }

    public function updateakun(Request $request)
    {
        $id = $request->id;
        $data = Member::where('member_id', $id)->first();

        $pesan = [
                    'required' => ':ATTRIBUTE harus diisi!',
                    'unique' => 'Email sudah dipakai!',
                    'max' => ':ATTRIBUTE maksimal :max karakter!',
                    'min' => ':ATTRIBUTE minimal :min karakter!',
                    'mimes' => 'File type tidak support!',
                ];

        if($request->email == $data->email)
        {
            $this->validate($request, [
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'avatar' => ['mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm'],
            ], $pesan);
        }

        else
        {
            $this->validate($request, [
            'name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:ki_member,email'],
            'avatar' => ['mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm'],
            ], $pesan);
        }

        if($request->hasFile('avatar'))
        {    
            if ($data->avatar == NULL) 
            {
                $avatar = $request->file('avatar');
                $filename = time()."_".$avatar->getClientOriginalName();
                $directory = 'file/avatar/'.$data->member_id;
                $avatar->move($directory, $filename);
            }

            else
            {
                File::delete('file/avatar/'.$data->member_id.'/'.$data->avatar);

                $avatar = $request->file('avatar');
                $filename = time()."_".$avatar->getClientOriginalName();
                $directory = 'file/avatar/'.$data->member_id;
                $avatar->move($directory, $filename);
            }

            Member::where('member_id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $filename,
            ]);
        }
        else
        {
            Member::where('member_id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            ]);
        }

        return back()->with('updateakun', 'Profil berhasil diubah!');
    }

    public function updatepassword(Request $request)
    {
        $id = $request->id;

        $pesan = [
                    'required' => ':ATTRIBUTE harus diisi!',
                    'same' => 'Konfirmasi Password harus sama!',
                    'max' => ':ATTRIBUTE maksimal :max karakter!',
                    'min' => ':ATTRIBUTE minimal :min karakter!',
                ];

        $this->validate($request, [
            'password_lama' => ['required', new SamaPasswordLama],      
            'password_baru' => ['required', 'string', 'min:8', 'confirmed'],
            'konfirm_password' => ['same:password_baru'],
        ], $pesan);

        Member::where('member_id', $id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with('updatepassword', 'Password berhasil diubah!');
    }
}
