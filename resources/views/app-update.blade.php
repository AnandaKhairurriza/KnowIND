@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<!--end of page level css-->

<!-- begining of page level js -->

<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-file"></i> Update</h3>
            </div>
            <div class="panel-body">
                @foreach($update as $upd)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><b>{{$upd->update_nama}}</b> <small>({{$upd->version_no}})</small></h1>
                                    <div style="margin-top: 3px;">
                                        <span style="font-size: 12px;">
                                            <i class="ti-time"></i> {{$upd->update_tgl->isoFormat('dddd, D MMM Y')}}
                                        </span>
                                    </div>
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-3">
                                        @if($upd->update_image != NULL)
                                        <img height="150px" width="220px" src="{{url('file/gambar/update/'.$upd->update_image)}}" style="display: block; margin-left: auto;margin-right: auto;">
                                        @else
                                        <img height="150px" width="220px" src="{{url('file/gambar/update/default.png')}}" style="display: block; margin-left: auto;margin-right: auto;">
                                        @endif
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="col-lg-12 height-event-desc">
                                            {!!$upd->update_desc!!}
                                        </div>
                                        
                                        <div class="col-lg-12 text-right" style="margin-top: 5px;">
                                            <a href="{{route('app-update-detail', $upd->update_id)}}">
                                                <button class="btn btn-primary">Selanjutnya</button>
                                            </a>
                                        </div>                              
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>                   
                </div>
                @endforeach
                <div class="col-lg-12 text-center">
                     {{$update->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection