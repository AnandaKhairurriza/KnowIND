<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Podcast;

class PodcastController extends Controller
{
    public function inputpodcast()
    {
        $user = User::all();
        return view('crud.input-podcast', compact('user'));
    }

    public function uploadpodcast(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_podcast' => 'required|max:100',
            'judul_podcast' => 'required|max:100',
            'gambar_podcast' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'file_podcast' => 'required|mimes:aac,aiff,amr,au,flac,oga,ogg,opus,m4a,mid,mp3,wav,weba,webm,wma',
            'deskripsi_podcast' => 'required',
        ], $pesan);

        $nomor = "POD".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Podcast::where('podcast_no',$nomor)->exists()) 
        {
            $nomor = "POD".mt_rand(100000, 999999);
        }

        $file = $request->file('gambar_podcast');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/podcast';
        $file->move($directory,$filename);

        $file2 = $request->file('file_podcast');
        $filename2 = time()."_".$file2->getClientOriginalName();
        $directory2 = 'file/audio/podcast';
        $file2->move($directory2,$filename2);

        if($request->member_podcast == NULL)
        {
            Podcast::create([
                    'member_id' => Auth::user()->member_id,
                    'podcast_no' => $nomor,
                    'PIC' => $request->pic_podcast, 
                    'podcast_judul' => $request->judul_podcast,
                    'podcast_desc' => $request->deskripsi_podcast,
                    'podcast_image' => $filename,
                    'podcast_link' => $filename2,
                    'podcast_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Podcast::create([
                    'member_id' => Auth::user()->member_id,
                    'podcast_no' => $nomor,
                    'PIC' => $request->pic_podcast, 
                    'podcast_judul' => $request->judul_podcast,
                    'podcast_desc' => $request->deskripsi_podcast,
                    'podcast_member' => implode(", ", $request->member_podcast),
                    'podcast_image' => $filename,
                    'podcast_link' => $filename2,
                    'podcast_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-podcast')->with('uploadpodcast', 'Data berhasil ditambahkan!');
    }

    public function editpodcast($id)
    {
        $podcast = Podcast::where('podcast_id',$id)->first();
        $user = User::all();
        return view('crud.edit-podcast', compact('podcast', 'user'));
    }


    public function updatepodcast(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_podcast' => 'required|max:100',
            'judul_podcast' => 'required|max:100',
            'gambar_podcast' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'file_podcast' => 'mimes:aac,aiff,amr,au,flac,oga,ogg,opus,m4a,mid,mp3,wav,weba,webm,wma',
            'deskripsi_podcast' => 'required',
        ], $pesan);

        Podcast::where('podcast_id',$id)->update([
                'PIC' => $request->pic_podcast, 
                'podcast_judul' => $request->judul_podcast,
                'podcast_desc' => $request->deskripsi_podcast,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]);

        if($request->hasFile('gambar_podcast') && $request->hasFile('file_podcast'))
        {
            $file = Podcast::where('podcast_id',$id)->first();
            File::delete('file/gambar/podcast/'.$file->podcast_image);
            File::delete('file/audio/podcast/'.$file->podcast_link);

            $file = $request->file('gambar_podcast');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/podcast';
            $file->move($directory,$filename);
        
            $file2 = $request->file('file_podcast');
            $filename2 = time()."_".$file2->getClientOriginalName();
            $directory2 = 'file/audio/podcast';
            $file2->move($directory2,$filename2);

            Podcast::where('podcast_id',$id)->update([
                    'podcast_image' => $filename,
                    'podcast_link' => $filename2,
            ]);            
        }

        else if($request->hasFile('gambar_podcast') && $request->hasFile('file_podcast') == NULL)
        {
            $file = Podcast::where('podcast_id',$id)->first();
            File::delete('file/gambar/podcast/'.$file->podcast_image);

            $file = $request->file('gambar_podcast');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/podcast';
            $file->move($directory,$filename);

            Podcast::where('podcast_id',$id)->update(['podcast_image' => $filename]);            
    
        }

        else if($request->hasFile('gambar_podcast') == NULL && $request->hasFile('file_podcast'))
        {
            $file = Podcast::where('podcast_id',$id)->first();
            File::delete('file/audio/podcast/'.$file->podcast_link);

            $file = $request->file('file_podcast');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/audio/podcast';
            $file->move($directory,$filename);

            Podcast::where('podcast_id',$id)->update(['podcast_link' => $filename]);
        }

        if($request->member_podcast == NULL)
        {
            Podcast::where('podcast_id',$id)->update(['podcast_member' => NULL]);            
        }
    
        else
        {
            Podcast::where('podcast_id',$id)->update(['podcast_member' => implode(", ", $request->member_podcast)]);            
        }

        Podcast::where('podcast_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-podcast')->with('updatepodcast', 'Data berhasil diedit!');
    }

    public function hapuspodcast($id)
    {
        $file = Podcast::where('podcast_id',$id)->first();
        File::delete('file/gambar/podcast/'.$file->podcast_image);
        File::delete('file/audio/podcast/'.$file->podcast_link);
        Podcast::where('podcast_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-podcast')->with('hapuspodcast', 'Data berhasil dihapus!');
    }
}