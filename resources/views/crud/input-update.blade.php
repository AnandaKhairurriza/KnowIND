@extends('crud.crud-template')

@section('form')

<!--CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-file"></i> Input Update
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
                <form id="form-validation" action="{{ route('upload-update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-update">
                            PIC
                        </label>
                        <div class="col-md-9">
                            <input id="pic" type="text" class="form-control" placeholder="Nama PIC (Max 100 karakter!)" maxlength="100" name="pic_update" value="{{old('pic_update')}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-update">
                            No Version
                        </label>
                        <div class="col-md-9">
                            <input id="ver" type="text" class="form-control" placeholder="Nomor Versi" maxlength="20" name="version_update" value="{{old('version_update')}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-update">
                            Nama
                        </label>
                        <div class="col-md-9">
                            <input id="ver" type="text" class="form-control" placeholder="Nama Update (Max 100 karakter!)" maxlength="100" name="nama_update" value="{{old('nama_update')}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="asalbahasa-kosakata">
                            Update Area
                        </label>
                        <div class="col-md-9">
                            <select id="select21" class="form-control select2" style="width:100%" name="area_update" required>
                                <option value="" selected>-</option>
                                @foreach($area as $are)
                                <option value="{{$are}}">{{$are}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="gambar-update">
                            Gambar Update
                        </label>
                        <div class="col-md-4">
                            <input id="input-21" type="file" accept="image/*" class="file-loading" name="gambar_update">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> bmp, gif, ico, jfif, jpeg, jpg, pjp, pjpeg, png, svg, svgz, tif, tiff, webp, xbm
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="deskripsi-update" style="margin-top: 10px">
                            Deskripsi
                        </label>
                        <div class="col-md-9">
                            <textarea id="summernote" rows="7" class="form-control resize_vertical" placeholder="Deskripsi Update" name="deskripsi_update" required>{{old('deskripsi_update')}}</textarea>
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
