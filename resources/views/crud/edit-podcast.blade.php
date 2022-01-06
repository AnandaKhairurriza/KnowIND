@extends('crud.crud-template')

@section('form')

<!--CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-headphone"></i> Edit Podcast
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
                <form id="form-validation" action="{{ route('update-podcast', $podcast->podcast_id) }}" method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-podcast">
                            PIC
                        </label>
                        <div class="col-md-9">
                            <input type="text" id="pic" class="form-control" placeholder="Nama PIC (Max 100 karakter!)" name="pic_podcast" value="{{$podcast->PIC}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="judul-podcast">
                            Judul Podcast
                        </label>
                        <div class="col-md-9">
                            <input id="judul" type="text" class="form-control" placeholder="Judul Podcast (Max 100 karakter!)" maxlength="100" name="judul_podcast" value="{{$podcast->podcast_judul}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <audio controls>
                                <source src="{{ url('/file/audio/podcast/'.$podcast->podcast_link) }}">
                            </audio>
                            <br>
                            <b>Current File</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="file-podcast">
                            File Podcast
                        </label>
                        <div class="col-md-4">
                            <input id="input-23" type="file" class="file-loading" accept="audio/*" data-show-preview="true" name="file_podcast">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> aac, aiff, amr, au, flac, oga, ogg, opus, m4a, mid, mp3, wav, weba, webm, wma</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <img src="{{ url('/file/gambar/podcast/'.$podcast->podcast_image) }}" alt="Image not found!" style="border: 3px solid lightgray; border-radius: 8px;  max-width: 300px; max-height: 300px;">
                            <br>
                            <b>Current Image</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="gambar-podcast">
                            Gambar Podcast
                        </label>
                        <div class="col-md-4">
                            <input id="input-21" type="file" accept="image/*" class="file-loading" name="gambar_podcast">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> bmp, gif, ico, jfif, jpeg, jpg, pjp, pjpeg, png, svg, svgz, tif, tiff, webp, xbm
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="deskripsi-podcast" style="margin-top: 10px">
                            Deskripsi
                        </label>
                        <div class="col-md-9">
                            <textarea id="summernote" rows="7" class="form-control resize_vertical" placeholder="Deskripsi Podcast" name="deskripsi_podcast" required>{{$podcast->podcast_desc}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <b>Current Member (ID)</b>
                            <input type="text"  name="X" value="{{$podcast->podcast_member}}" disabled style="margin-bottom: 2px; width: 100%">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="member-podcast">
                            Member
                        </label>
                        <div class="col-md-9">
                            <select id="select22" class="form-control select2" style="width:100%" name="member_podcast[]" multiple>
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
                            <button type="submit" class="btn btn-effect-ripple btn-primary">Update</button>
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