@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<link rel="stylesheet" type="text/css" href="vendors/leaflet/css/leaflet.css"/>
<!--end of page level css-->

<!-- begining of page level js -->
<script type="text/javascript" src="vendors/leaflet/js/leaflet-src.js"></script>
<script type="text/javascript" src="js/custom_js/advanced_maps.js"></script>
<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-lg-7">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-user"></i> Tentang Kami</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <img src="{{url('img/LogoKnowIND.png')}}" width="300" height="300" style="display: block; margin: auto;">
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-justify"><b>KnowIND</b> adalah sebuah aplikasi mobile yang berisi tentang informasi setiap daerah yang ada di Indonesia. Mulai dari kuliner, kesenian, bahasa, hingga tempat wisata khas daerah tersebut. Aplikasi ini bersifat open, sehingga user dapat mendaftar sebagai kontributor untuk membantu memperkaya aplikasi ini dengan menambahkan konten.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <div class="panel">
            <div class="panel-heading text-primary">
                <h3 class="panel-title"><i class="ti-user"></i> Kontak Kami</h3>
            </div>
            <div class="panel-body">
                <div class="col-lg-10 col-lg-offset-1">
                    <div id="advanced_map" class="gmap" style="border: 1px solid black; height: 300px;"></div>
                </div>
                <div class="col-lg-12" style="padding-top: 20px;">
                    <p class="text-justify"><b>Contact us :</b></p>
                    <span class="ti-email"></span> : admin@knowind.com
                </div>
            </div>
        </div>
    </div>
</div>

@endsection