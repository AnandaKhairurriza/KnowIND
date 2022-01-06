@extends('crud.crud-template')

@section('form')

<!--CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-video-camera"></i> Edit Video
                </h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li><b>- {{ $error }}</b></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="panel-body">
                <form id="form-validation" action="{{ route('update-video', $video->video_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-video">
                            PIC
                        </label>
                        <div class="col-md-9">
                            <input type="text" id="pic" class="form-control" placeholder="Nama PIC (Max 100 karakter!)" name="pic_video" value="{{$video->PIC}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="judul-video">
                            Judul Video
                        </label>
                        <div class="col-md-9">
                            <input id="judul" type="text" class="form-control" placeholder="Judul Video (Max 100 karakter!)" maxlength="100" name="judul_video" value="{{$video->video_judul}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <video width="320" height="240" controls>
                                <source src="{{ url('/file/video/video/'.$video->video_link) }}">
                            </video>
                            <br>
                            <b>Current File</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="file-video">
                            File Video
                        </label>
                        <div class="col-md-4">
                            <input id="input-23" type="file" class="file-loading" accept="video/*" data-show-preview="true" name="file_video">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> asx, avi, m4v, mov, mp4, mpeg, mpg, ogm, ofv, webm, wmv</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <img src="{{ url('/file/gambar/video/'.$video->video_image) }}" alt="Image not found!" style="border: 3px solid lightgray; border-radius: 8px; max-width: 300px; max-height: 300px;">
                            <br>
                            <b>Current Image</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="gambar-video">
                            Gambar Video
                        </label>
                        <div class="col-md-4">
                            <input id="input-21" type="file" accept="image/*" class="file-loading" name="gambar_video">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> bmp, gif, ico, jfif, jpeg, jpg, pjp, pjpeg, png, svg, svgz, tif, tiff, webp, xbm
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="deskripsi-video" style="margin-top: 10px">
                            Deskripsi
                        </label>
                        <div class="col-md-9">
                            <textarea id="summernote" rows="7" class="form-control resize_vertical" placeholder="Deskripsi Video" name="deskripsi_video" required>{{$video->video_desc}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <b>Current Member (ID)</b>
                            <input type="text"  name="X" value="{{$video->video_member}}" disabled style="margin-bottom: 2px; width: 100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="member-video">
                            Member
                        </label>
                        <div class="col-md-9">
                            <select id="select22" class="form-control select2" style="width:100%" name="member_video[]" multiple>
                                <optgroup label="Member List">
                                    @foreach ($user as $us)
                                    <option value="{{$us ->name}} ({{$us ->member_id}})">{{$us ->name}} ( ID = {{$us ->member_id}})</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-2">
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Submit</button>
                            <button type="reset" class="btn btn-effect-ripple btn-default reset_btn">Reset
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
