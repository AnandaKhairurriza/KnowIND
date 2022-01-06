<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Image;
use Auth;
use Carbon\Carbon;

use App\User;
use App\Models\Video;

class VideoController extends Controller
{
    public function inputvideo()
    {
        $user = User::all();
        return view('crud.input-video', compact('user'));
    }

    public function uploadvideo(Request $request)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_video' => 'required|max:100',
            'judul_video' => 'required|max:100',
            'gambar_video' => 'required|mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'file_video' => 'required|mimes:asx,avi,m4v,mov,mp4,mpeg,mpg,ogm,ofv,webm,wmv',
            'deskripsi_video' => 'required',
        ], $pesan);

        $nomor = "VID".mt_rand(100000, 999999);

        //Check if number already exist (if exist regenerate number)
        if (Video::where('video_no',$nomor)->exists()) 
        {
            $nomor = "VID".mt_rand(100000, 999999);
        }

        $file = $request->file('gambar_video');
        $filename = time()."_".$file->getClientOriginalName();
        $directory = 'file/gambar/video';
        $file->move($directory,$filename);

        $file2 = $request->file('file_video');
        $filename2 = time()."_".$file2->getClientOriginalName();
        $directory2 = 'file/video/video';
        $file2->move($directory2,$filename2);

        if($request->member_video == NULL)
        {
            Video::create([
                    'member_id' => Auth::user()->member_id,
                    'video_no' => $nomor,
                    'PIC' => $request->pic_video, 
                    'video_judul' => $request->judul_video,
                    'video_desc' => $request->deskripsi_video,
                    'video_image' => $filename,
                    'video_link' => $filename2,
                    'video_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }
    
        else
        {
            Video::create([
                    'member_id' => Auth::user()->member_id,
                    'video_no' => $nomor,
                    'PIC' => $request->pic_video, 
                    'video_judul' => $request->judul_video,
                    'video_desc' => $request->deskripsi_video,
                    'video_member' => implode(", ", $request->member_video),
                    'video_image' => $filename,
                    'video_link' => $filename2,
                    'video_tgl' => Carbon::now()->toDateString(),
                    'created_at' => Carbon::now(),
            ]);            
        }

        return redirect()->route('manage-database', '#tabel-video')->with('uploadvideo', 'Data berhasil ditambahkan!');
    }

    public function editvideo($id)
    {
        $video = Video::where('video_id',$id)->first();
        $user = User::all();
        return view('crud.edit-video', compact('video', 'user'));
    }


    public function updatevideo(Request $request, $id)
    {
        $pesan = [
        'required' => ':ATTRIBUTE harus diisi!',
        'mimes' => 'File type tidak support!',
        'max' => ':ATTRIBUTE maksimal :max karakter!',
        ];

        $this->validate($request, [
            'pic_video' => 'required|max:100',
            'judul_video' => 'required|max:100',
            'gambar_video' => 'mimes:bmp,gif,ico,jfif,jpeg,jpg,pjp,jpeg,png,svg,svgz,tif,tiff,webp,xbm',
            'file_video' => 'mimes:asx,avi,m4v,mov,mp4,mpeg,mpg,ogm,ofv,webm,wmv',
            'deskripsi_video' => 'required',
        ], $pesan);

        Video::where('video_id',$id)->update([
                'PIC' => $request->pic_video, 
                'video_judul' => $request->judul_video,
                'video_desc' => $request->deskripsi_video,
                'rev_tgl' => Carbon::now()->toDateString(),
                'updated_at' => Carbon::now(),
        ]); 

        if($request->hasFile('gambar_video') && $request->hasFile('file_video'))
        {
            $file = Video::where('video_id',$id)->first();
            File::delete('file/gambar/video/'.$file->video_image);
            File::delete('file/video/video/'.$file->video_link);

            $file = $request->file('gambar_video');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/video';
            $file->move($directory,$filename);
        
            $file2 = $request->file('file_video');
            $filename2 = time()."_".$file2->getClientOriginalName();
            $directory2 = 'file/video/video';
            $file2->move($directory2,$filename2);

            Video::where('video_id',$id)->update([
                    'video_image' => $filename,
                    'video_link' => $filename2,
            ]);            
        }

        else if($request->hasFile('gambar_video') && $request->hasFile('file_video') == NULL)
        {
            $file = Video::where('video_id',$id)->first();
            File::delete('file/gambar/video/'.$file->video_image);

            $file = $request->file('gambar_video');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/gambar/video';
            $file->move($directory,$filename);
    
            Video::where('video_id',$id)->update(['video_image' => $filename]);            

        }

        else if($request->hasFile('gambar_video') == NULL && $request->hasFile('file_video'))
        {
            $file = Video::where('video_id',$id)->first();
            File::delete('file/video/video/'.$file->video_link);

            $file = $request->file('file_video');
            $filename = time()."_".$file->getClientOriginalName();
            $directory = 'file/video/video';
            $file->move($directory,$filename);
        
            Video::where('video_id',$id)->update(['video_link' => $filename]);            
        }

        if($request->member_video == NULL)
        {
            Video::where('video_id',$id)->update(['video_member' => NULL]);            
        }
        
        else
        {
            Video::where('video_id',$id)->update(['video_member' => implode(", ", $request->member_video)]);            
        }

        Video::where('video_id',$id)->increment('rev_no', 1);

        return redirect()->route('manage-database', '#tabel-video')->with('updatevideo', 'Data berhasil diedit!');
    }

    public function hapusvideo($id)
    {
        $file = Video::where('video_id',$id)->first();
        File::delete('file/gambar/video/'.$file->video_image);
        File::delete('file/video/video/'.$file->video_link);
        Video::where('video_id',$id)->delete();

        return redirect()->route('manage-database', '#tabel-video')->with('hapusvideo', 'Data berhasil dihapus!');
    }
}