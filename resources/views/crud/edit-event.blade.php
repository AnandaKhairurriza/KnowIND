@extends('crud.crud-template')

@section('form')

<!--CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="panel ">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-calendar"></i> Edit Event
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
                <form id="form-validation" action="{{ route('update-event', $event->event_id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-event">
                            PIC
                        </label>
                        <div class="col-md-9">
                            <input id="pic" type="text" class="form-control" placeholder="Nama PIC (Max 100 karakter!)" maxlength="100" name="pic_event" value="{{$event->PIC}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="pic-event">
                            Nama Event
                        </label>
                        <div class="col-md-9">
                            <input id="nama_event" type="text" class="form-control" placeholder="Nama Event (Max 100 karakter!)" maxlength="100" name="nama_event" value="{{$event->event_nama}}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="mulai-event" style="margin-top: 10px">
                            Event Mulai
                        </label>
                        <div class="col-md-3">
                            <div class="input-group m-t-10">
                                <div class="input-group-addon">
                                    <i class="fa fa-fw ti-calendar"></i></div>
                                <input id="check_in_date" class="form-control" placeholder="Tanggal Mulai Event" name="mulai_event" value="{{$event->event_mulai->format('Y-m-d')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="selesai-event" style="margin-top: 10px">
                            Event Selesai
                        </label>
                        <div class="col-md-3">
                            <div class="input-group m-t-10">
                                <div class="input-group-addon">
                                    <i class="fa fa-fw ti-calendar"></i></div>
                                <input id="check_out_date" class="form-control" placeholder="Tanggal Selesai Event" name="selesai_event" value="{{$event->event_selesai->format('Y-m-d')}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <br>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <img src="{{ url('/file/gambar/event/'.$event->event_image) }}" alt="Image not found!" style="border: 3px solid lightgray; border-radius: 8px;  max-width: 300px; max-height: 300px;">
                            <br>
                            <b>Current Image</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="gambar-event">
                            Gambar Event
                        </label>
                        <div class="col-md-4">
                            <input id="input-21" type="file" accept="image/*" class="file-loading" name="gambar_event">
                        </div>
                        <div class="col-md-5">
                            Support extension : <b> bmp, gif, ico, jfif, jpeg, jpg, pjp, pjpeg, png, svg, svgz, tif, tiff, webp, xbm
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="deskripsi-event" style="margin-top: 10px">
                            Deskripsi
                        </label>
                        <div class="col-md-9">
                            <textarea id="summernote" rows="7" class="form-control resize_vertical" placeholder="Deskripsi Event" name="deskripsi_event" required>{{$event->event_desc}}</textarea>
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
