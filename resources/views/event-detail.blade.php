@extends('template')

@section('content')

<!--page level css -->

<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<!--end of page level css-->

<!-- begining of page level js -->

<!--<script type="text/javascript" src="js/custom_js/calendar_custom.js"></script>-->
<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-layout-cta-left"></i> {{$event->event_nama}}</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                        <span style="font-size: 12px;">
                                            <i class="ti-time"></i> <b>{{$event->event_mulai->isoFormat('dddd, D MMM Y')}}</b> - <b>{{$event->event_selesai->isoFormat('dddd, D MMM Y')}}</b>
                                        </span>
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <img src="{{url('file/gambar/event/'.$event->event_image) }}" style="display: block; margin-left: auto;margin-right: auto; width: 80%;">
                                    </div>
                                    <div class="col-xs-10 col-xs-offset-1" style="margin-top: 30px;">
                                            {!!$event->event_desc!!}                    
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>                   
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection