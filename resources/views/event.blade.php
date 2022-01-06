@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{url('vendors/fullcalendar/css/fullcalendar.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/iCheck/css/all.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/calendar_custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/fullcalendar/css/fullcalendar.print.css')}}" media="print">
<!--end of page level css-->

<!-- begining of page level js -->
<script src="{{url('vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/fullcalendar/js/fullcalendar.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/calendar_custom.js')}}"></script>
<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-calendar"></i> Event</h3>
            </div>
            <div class="panel-body">
                @foreach($event as $eve)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h1 class="panel-title"><b>{{$eve->event_nama}}</b></h1>
                                    <div style="margin-top: 3px;">
                                        <span style="font-size: 12px;">
                                            <i class="ti-time"></i> {{$eve->event_mulai->isoFormat('dddd, D MMM Y')}}
                                        </span>
                                    </div>
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img height="150px" width="220px" src="{{url('file/gambar/event/' .$eve->event_image)}}" style="display: block; margin-left: auto;margin-right: auto;">
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="col-lg-12 height-event-desc">
                                            {!!$eve->event_desc!!}
                                        </div>
                                        
                                        <div class="col-lg-12 text-right" style="margin-top: 5px;">
                                            <a href="{{route('event-detail', $eve->event_id)}}">
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
                     {{$event->links()}}
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4  col-md-12">
        <div class="row">
            <div class="panel">
                <div class="panel-heading text-primary">
                        <h3 class="panel-title">
                            <i class="ti-calendar"></i>  Kalender
                        </h3>
                    <span class="pull-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="box">
                            <div class="box-body">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

@endsection