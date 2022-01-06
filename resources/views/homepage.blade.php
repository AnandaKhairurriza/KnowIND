@extends('template')

@section('content')
       
<!--page level css -->
<link rel="stylesheet" href="vendors/swiper/css/swiper.min.css">
<link rel="stylesheet" href="vendors/lcswitch/css/lc_switch.css">
<link rel="stylesheet" href="css/custom_css/dashboard1_timeline.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" type="text/css" href="css/custom_css/dashboard1.css">
<link rel="stylesheet" type="text/css" href="vendors/nvd3/css/nv.d3.min.css">
<!--end of page level css-->

<!-- begining of page level js -->
<!--Sparkline Chart-->
<script type="text/javascript" src="js/custom_js/sparkline/jquery.flot.spline.js"></script>
<!-- flip --->
<script type="text/javascript" src="vendors/flip/js/jquery.flip.min.js"></script>
<script type="text/javascript" src="vendors/lcswitch/js/lc_switch.min.js"></script>
<!--flot chart-->
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.js"></script>
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.resize.js"></script>
<script type="text/javascript" src="vendors/flotchart/js/jquery.flot.stack.js"></script>
<script type="text/javascript" src="vendors/flotspline/js/jquery.flot.spline.min.js"></script>
<script type="text/javascript" src="vendors/flot.tooltip/js/jquery.flot.tooltip.js"></script>
<!--swiper-->
<script type="text/javascript" src="vendors/swiper/js/swiper.min.js"></script>
<!--chartjs-->
<script src="vendors/chartjs/js/Chart.js"></script>
<!--nvd3 chart-->
<script type="text/javascript" src="js/nvd3/d3.v3.min.js"></script>
<script type="text/javascript" src="vendors/nvd3/js/nv.d3.min.js"></script>
<script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="vendors/advanced_newsTicker/js/newsTicker.js"></script>
<script type="text/javascript" src="js/dashboard1.js"></script>
<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon pull-left">
                    <i class="ti-thumb-up text-warning"></i>
                </div>
                <div class="text-right" style="padding: 20px 0px;">
                    <h4 class="text-dark"><b>Jadi Kontributor</b></h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center" style="height: 100px;">
                    <b>Sebagai kontributor Anda dapat berkontribusi untuk menambahkan konten untuk aplikasi KnowIND</b>
                    <br>
                    <br>
                    <a href="{{route('daftar-akun')}}">Klik disini untuk mendaftar sekarang!</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon pull-left">
                    <i class="ti-user text-success"></i>
                </div>
                <div class="text-right" style="padding: 20px 0px;">
                    <h4 class="text-dark"><b>List Kontributor</b></h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center" style="height: 100px;">
                    <b>Berisi daftar orang-orang yang telah berkontribusi terhadap konten-konten di aplikasi KnowIND</b>
                    <br>
                    <br>
                    <a href="{{route('list-kontributor')}}">Klik disini untuk melihat</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="flip">
            <div class="widget-bg-color-icon card-box front">
                <div class="bg-icon pull-left">
                    <i class="ti-gift text-danger"></i>
                </div>
                <div class="text-right" style="padding: 20px 0px;">
                    <h4 class="text-dark"><b>Donasi</b></h4>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-bg-color-icon card-box back">
                <div class="text-center" style="height: 100px;">
                    <b>Sebagai bentuk bantuan untuk mengembangkan aplikasi KnowIND, Anda dapat mendonasikan dengan mengklik link dibawah!</b>
                    <br>
                    <br>
                    <a href="{{route('donasi')}}">Klik disini untuk donasi</a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-xs-12">
        <div class="row">
            <!--PANEL KEGIATAN-->
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="{{route('event')}}"><h3 class="panel-title"><i class="ti-layout-cta-left"></i> Event</h3></a>
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
                                            <div class="col-lg-4">
                                                <img height="150px" width="220px" src="{{'file/gambar/event/' .$eve->event_image}}" style="display: block; margin-left: auto;margin-right: auto;">
                                            </div>
                                            <div class="col-lg-8">
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
                    </div>
                </div>
            </div>
            <!--PANEL KEGIATAN-->

            <div class="col-sm-12">
                <div class="panel nvd3-panel">
                    <div class="panel-heading">
                        <a href="{{route('app-update')}}"><h3 class="panel-title"><i class="ti-layout-cta-left"></i> App Update</h3></a>
                    </div>
                    <div class="panel-body">
                        <ul class="schedule-cont">
                            @foreach ($update as $upd)
                            <li class="item">
                                <div class="data">
                                    <div class="time text-muted">{{$upd->update_tgl->diffForHumans()}}</div>
                                    <p>{!!$upd->update_nama!!}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
    <div class="col-lg-3  col-xs-12">
        <div class="row">
            <div class="col-lg-12 col-sm-6">
                <div class="panel">
                    <div class="panel-heading">
                        <a href="{{route('list-kontributor')}}">
                            <h3 class="panel-title">
                                <i class="ti-user"></i>  Kontributor
                            </h3>
                        </a>
                        <span class="pull-right">
                                <i class="fa fa-fw ti-angle-up clickable"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($member as $mem)
                                    <tr>
                                        <td>{{$index++}}</td>
                                        <td>{{$mem->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
