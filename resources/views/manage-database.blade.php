@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" href="{{url('vendors/swiper/css/swiper.min.css')}}">
<link rel="stylesheet" href="{{url('vendors/lcswitch/css/lc_switch.css')}}">
<link rel="stylesheet" href="{{url('css/custom_css/dashboard1_timeline.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/nvd3/css/nv.d3.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/datatables/css/dataTables.bootstrap.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('vendors/datatablesmark.js/css/datatables.mark.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/responsive_datatables.css')}}">
<!--end of page level css-->

<!-- begining of page level js -->
<script type="text/javascript" src="{{url('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/responsive_datatables.js')}}"></script>
<script src="{{url('vendors/mark.js/jquery.mark.js')}}" charset="UTF-8"></script>
<script src="{{url('vendors/datatablesmark.js/js/datatables.mark.min.js')}}" charset="UTF-8"></script>
<!-- end of page level js -->

<!--CONTENT-->
<div id="konten"></div>
<h3><b>Konten</b></h3>
<div class="konten" style="border: 1px solid gray; padding: 20px">
    <!-- artikel table start -->
    <div id="tabel-artikel"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-book"></i> Data Artikel
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadartikel'))
                        <div class="alert alert-success">
                            {{ session('uploadartikel') }}
                        </div>
                    @elseif (session('updateartikel'))
                        <div class="alert alert-info">
                            {{ session('updateartikel') }}
                        </div>
                    @elseif (session('hapusartikel'))
                        <div class="alert alert-danger">
                            {{ session('hapusartikel') }}
                        </div>
                    @endif
                    <a href="{{ route('input-artikel') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($artikel as $art)
                                <tr>
                                    <td>{{$art->artikel_id}}</td>
                                    <td><div class="height-content">{{$art->PIC}}</div></td>
                                    <td>{{$art->artikel_no}}</td>
                                    <td><div class="height-content">{{$art->artikel_judul}}</div></td>
                                    <td><div class="height-content">{!!$art->artikel_desc!!}</div></td>
                                    <td><div class="height-content">{{$art->artikel_image}}</div></td>
                                    <td>{{$art->member->name}} ({{$art->member->member_id}})</td>
                                    <td><div class="height-content">{{$art->artikel_member}}</div></td>
                                    <td>{{$art->artikel_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        @if($art->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$art->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($art->rev_no == 0)
                                            -
                                        @else 
                                            {{$art->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-artikel', $art->artikel_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-artikel', $art->artikel_id)}}" onclick="return confirm('Anda yakin ingin menghapus data artikel ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- artikel table end -->

    <!-- podcast table start -->
    <div id="tabel-podcast"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-headphone"></i> Data Podcast
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadpodcast'))
                        <div class="alert alert-success">
                            {{ session('uploadpodcast') }}
                        </div>
                    @elseif (session('updatepodcast'))
                        <div class="alert alert-info">
                            {{ session('updatepodcast') }}
                        </div>
                    @elseif (session('hapuspodcast'))
                        <div class="alert alert-danger">
                            {{ session('hapuspodcast') }}
                        </div>
                    @endif
                    <a href="{{ route('input-podcast') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>File</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($podcast as $pod)
                                <tr>
                                    <td>{{$pod->podcast_id}}</td>
                                    <td><div class="height-content">{{$pod->PIC}}</div></td>
                                    <td>{{$pod->podcast_no}}</td>
                                    <td><div class="height-content">{{$pod->podcast_judul}}</div></td>
                                    <td><div class="height-content">{!!$pod->podcast_desc!!}</div></td>
                                    <td><div class="height-content">{{$pod->podcast_image}}</div></td>
                                    <td>
                                        <audio controls src="{{ url('/file/audio/podcast/'.$pod->podcast_link) }}">
                                    </td>
                                    <td>{{$pod->member->name}} ({{$pod->member->member_id}})</td>
                                    <td><div class="height-content">{{$pod->podcast_member}}</div></td>
                                    <td>{{$pod->podcast_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        @if($pod->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$pod->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($pod->rev_no == 0)
                                            -
                                        @else 
                                            {{$pod->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-podcast', $pod->podcast_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-podcast', $pod->podcast_id)}}" onclick="return confirm('Anda yakin ingin menghapus data podcast ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>                                       
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--podcast table end -->

    <!-- video table start -->
    <div id="tabel-video"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-video-camera"></i> Data Video
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadvideo'))
                        <div class="alert alert-success">
                            {{ session('uploadvideo') }}
                        </div>
                    @elseif (session('updatevideo'))
                        <div class="alert alert-info">
                            {{ session('updatevideo') }}
                        </div>
                    @elseif (session('hapusvideo'))
                        <div class="alert alert-danger">
                            {{ session('hapusvideo') }}
                        </div>
                    @endif
                    <a href="{{ route('input-video') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>File</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($video as $vid)
                                <tr>
                                    <td>{{$vid->video_id}}</td>
                                    <td><div class="height-content">{{$vid->PIC}}</div></td>
                                    <td>{{$vid->video_no}}</td>
                                    <td><div class="height-content">{{$vid->video_judul}}</div></td>
                                    <td><div class="height-content">{!!$vid->video_desc!!}</div></td>
                                    <td><div class="height-content">{{$vid->video_image}}</div></td>
                                    <td>
                                        <video width="240" height="160"  controls>
                                            <source src="{{ url('/file/video/video/'.$vid->video_link) }}">
                                        </video>
                                    </td>
                                    <td>{{$vid->member->name}} ({{$vid->member->member_id}})</td>
                                    <td><div class="height-content">{{$vid->video_member}}</div></td>
                                    <td>{{$vid->video_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        @if($vid->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$vid->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($vid->rev_no == 0)
                                            -
                                        @else 
                                            {{$vid->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-video', $vid->video_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-video', $vid->video_id)}}" onclick="return confirm('Anda yakin ingin menghapus data video ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video table end -->

    <!-- event table start -->
    <div id="tabel-video"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-calendar"></i> Data Event
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadevent'))
                        <div class="alert alert-success">
                            {{ session('uploadevent') }}
                        </div>
                    @elseif (session('updateevent'))
                        <div class="alert alert-info">
                            {{ session('updateevent') }}
                        </div>
                    @elseif (session('hapusevent'))
                        <div class="alert alert-danger">
                            {{ session('hapusevent') }}
                        </div>
                    @endif
                    <a href="{{ route('input-event') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Nama Event</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Event Mulai</th>
                                    <th>Event Selesai</th>
                                    <th>Penginput (ID)</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($event as $eve)
                                <tr>
                                    <td>{{$eve->event_id}}</td>
                                    <td><div class="height-content">{{$eve->PIC}}</div></td>
                                    <td>{{$eve->event_no}}</td>
                                    <td><div class="height-content">{{$eve->event_nama}}</div></td>
                                    <td><div class="height-content">{!!$eve->event_desc!!}</div></td>
                                    <td><div class="height-content">{{$eve->event_image}}</div></td>
                                    <td>{{$eve->event_mulai->format('d-m-Y')}}</td>
                                    <td>{{$eve->event_selesai->format('d-m-Y')}}</td>
                                    <td>{{$eve->member->name}} ({{$eve->member->member_id}})</td>
                                    <td>
                                        @if($eve->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$eve->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($eve->rev_no == 0)
                                            -
                                        @else 
                                            {{$eve->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-event', $eve->event_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-event', $eve->event_id)}}" onclick="return confirm('Anda yakin ingin menghapus data event ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- event table end -->

    <!-- hotel table start -->
    <div id="tabel-hotel"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-map-alt"></i> Data Hotel
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadhotel'))
                        <div class="alert alert-success">
                            {{ session('uploadhotel') }}
                        </div>
                    @elseif (session('updatehotel'))
                        <div class="alert alert-info">
                            {{ session('updatehotel') }}
                        </div>
                    @elseif (session('hapushotel'))
                        <div class="alert alert-danger">
                            {{ session('hapushotel') }}
                        </div>
                    @endif
                    <a href="{{ route('input-hotel') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Nama Hotel</th>
                                    <th>Deskripsi</th>
                                    <th>Alamat Hotel</th>
                                    <th>Gambar</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hotel as $hot)
                                <tr>
                                    <td>{{$hot->hotel_id}}</td>
                                    <td><div class="height-content">{{$hot->PIC}}</div></td>
                                    <td>{{$hot->hotel_no}}</td>
                                    <td><div class="height-content">{{$hot->hotel_nama}}</div></td>
                                    <td><div class="height-content">{!!$hot->hotel_desc!!}</div></td>
                                    <td><div class="height-content">{{$hot->hotel_alamat}}</div></td>
                                    <td><div class="height-content">{{$hot->hotel_image}}</div></td>
                                    <td>{{$hot->member->name}} ({{$hot->member->member_id}})</td>
                                    <td><div class="height-content">{{$hot->hotel_member}}</div></td>
                                    <td>{{$hot->hotel_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        @if($hot->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$hot->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($hot->rev_no == 0)
                                            -
                                        @else 
                                            {{$hot->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-hotel', $hot->hotel_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-hotel', $hot->hotel_id)}}" onclick="return confirm('Anda yakin ingin menghapus data hotel ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hotel table end -->

    <!-- wisata table start -->
    <div id="tabel-wisata"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-map"></i> Data Wisata
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadwisata'))
                        <div class="alert alert-success">
                            {{ session('uploadwisata') }}
                        </div>
                    @elseif (session('updatewisata'))
                        <div class="alert alert-info">
                            {{ session('updatewisata') }}
                        </div>
                    @elseif (session('hapuswisata'))
                        <div class="alert alert-danger">
                            {{ session('hapuswisata') }}
                        </div>
                    @endif
                    <a href="{{ route('input-wisata') }}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Nama Hotel</th>
                                    <th>Deskripsi</th>
                                    <th>Alamat Hotel</th>
                                    <th>Gambar</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Dibuat</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wisata as $wis)
                                <tr>
                                    <td>{{$wis->wisata_id}}</td>
                                    <td><div class="height-content">{{$wis->PIC}}</div></td>
                                    <td>{{$wis->wisata_no}}</td>
                                    <td><div class="height-content">{{$wis->wisata_nama}}</div></td>
                                    <td><div class="height-content">{!!$wis->wisata_desc!!}</div></td>
                                    <td><div class="height-content">{{$wis->wisata_alamat}}</div></td>
                                    <td><div class="height-content">{{$wis->wisata_image}}</div></td>
                                    <td>{{$wis->member->name}} ({{$wis->member->member_id}})</td>
                                    <td><div class="height-content">{{$wis->wisata_member}}</div></td>
                                    <td>{{$wis->wisata_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        @if($wis->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$wis->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($wis->rev_no == 0)
                                            -
                                        @else 
                                            {{$wis->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-wisata', $wis->wisata_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-wisata', $wis->wisata_id)}}" onclick="return confirm('Anda yakin ingin menghapus data wisata ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wisata table end -->

</div>

<div id="penerjemah"></div>
<h3 style="margin-top: 50px"><b>Penerjemah</b></h3>
<div class="tabel-penerjemah" style="border: 1px solid gray; padding: 20px">
    <!-- Kosakata table start -->
    <div id="tabel-kosakata"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-comment-alt"></i> Data Kosakata
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadkosakata'))
                        <div class="alert alert-success">
                            {{ session('uploadkosakata') }}
                        </div>
                    @elseif (session('updatekosakata'))
                        <div class="alert alert-info">
                            {{ session('updatekosakata') }}
                        </div>
                    @elseif (session('hapuskosakata'))
                        <div class="alert alert-danger">
                            {{ session('hapuskosakata') }}
                        </div>
                    @endif
                    <a href="{{route('input-kosakata')}}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Asal Bahasa</th>
                                    <th>Bahasa Daerah</th>
                                    <th>Bahasa Indonesia</th>
                                    <th>Bahasa Inggris</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kosakata as $kos)
                                <tr>
                                    <td>{{$kos->kosakata_id}}</td>
                                    <td><div class="height-content">{{$kos->PIC}}</div></td>
                                    <td>{{$kos->kosakata_no}}</td>
                                    <td><div class="height-content">{{$kos->asalbahasa->asalbahasa_nama}}</div></td>
                                    <td><div class="height-content">{{$kos->bahasa_daerah}}</div></td>
                                    <td><div class="height-content">{{$kos->bahasa_indonesia}}</div></td>
                                    <td><div class="height-content">{{$kos->bahasa_inggris}}</div></td>
                                    <td>{{$kos->member->name}} ({{$kos->member->member_id}})</td>
                                    <td><div class="height-content">{{$kos->kosakata_member}}</div></td>
                                    <td>
                                        @if($kos->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$kos->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($kos->rev_no == 0)
                                            -
                                        @else 
                                            {{$kos->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-kosakata', $kos->kosakata_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-kosakata', $kos->kosakata_id)}}" onclick="return confirm('Anda yakin ingin menghapus data kosakata ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kosakata table end -->
    <!-- Kalimat table start -->
    <div id="tabel-kalimat"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-comments"></i> Data Kalimat
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadkalimat'))
                        <div class="alert alert-success">
                            {{ session('uploadkalimat') }}
                        </div>
                    @elseif (session('updatekalimat'))
                        <div class="alert alert-info">
                            {{ session('updatekalimat') }}
                        </div>
                    @elseif (session('hapuskalimat'))
                        <div class="alert alert-danger">
                            {{ session('hapuskalimat') }}
                        </div>
                    @endif
                    <a href="{{route('input-kalimat')}}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>Asal Bahasa</th>
                                    <th>Bahasa Daerah</th>
                                    <th>Bahasa Indonesia</th>
                                    <th>Bahasa Inggris</th>
                                    <th>Penginput (ID)</th>
                                    <th>Member (ID)</th>
                                    <th>Diedit</th>
                                    <th>Jml Diedit</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kalimat as $kal)
                                <tr>
                                    <td>{{$kal->kalimat_id}}</td>
                                    <td><div class="height-content">{{$kal->PIC}}</div></td>
                                    <td>{{$kal->kalimat_no}}</td>
                                    <td><div class="height-content">{{$kal->asalbahasa->asalbahasa_nama}}</div></td>
                                    <td><div class="height-content">{{$kal->bahasa_daerah}}</div></td>
                                    <td><div class="height-content">{{$kal->bahasa_indonesia}}</div></td>
                                    <td><div class="height-content">{{$kal->bahasa_inggris}}</div></td>
                                    <td>{{$kal->member->name}} ({{$kal->member->member_id}})</td>
                                    <td><div class="height-content">{{$kal->kalimat_member}}</div></td>
                                    <td>
                                        @if($kal->rev_tgl == NULL)
                                            -
                                        @else
                                            {{$kal->rev_tgl->format('d-m-Y')}}
                                        @endif                                
                                    </td>
                                    <td>
                                        @if($kal->rev_no == 0)
                                            -
                                        @else 
                                            {{$kal->rev_no}}
                                        @endif                                
                                    </td>
                                    @if(Auth::user()->type == 'admin')
                                    <td>
                                        <a href="{{ route('edit-kalimat', $kal->kalimat_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-kalimat', $kal->kalimat_id)}}" onclick="return confirm('Anda yakin ingin menghapus data kalimat ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kalimat table end -->
</div>

@if(Auth::user()->type == 'admin')
<div id="update"></div>
<h3 style="margin-top: 50px"><b>Update</b></h3>
<div class="tabel-update" style="border: 1px solid gray; padding: 20px">
    <!-- Update table start -->
    <div id="tabel-update"></div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel filterable">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="ti-file"></i> Data Update
                    </h3>
                </div>
                <div class="panel-body">
                    @if (session('uploadupdate'))
                        <div class="alert alert-success">
                            {{ session('uploadupdate') }}
                        </div>
                    @elseif (session('updateupdate'))
                        <div class="alert alert-info">
                            {{ session('updateupdate') }}
                        </div>
                    @elseif (session('hapusupdate'))
                        <div class="alert alert-danger">
                            {{ session('hapusupdate') }}
                        </div>
                    @endif
                    <a href="{{route('input-update')}}">
                        <button class="btn btn-primary" style="margin-top: 10px">TAMBAH DATA!</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table4">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>PIC</th>
                                    <th>No</th>
                                    <th>No. Ver</th>
                                    <th>Nama</th>
                                    <th>Area</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Penginput (ID)</th>
                                    <th>Dibuat</th>
                                    @if(Auth::user()->type == 'admin')
                                    <th data-sortable="false"></th>
                                    <th data-sortable="false"></th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($update as $upd)
                                <tr>
                                    <td>{{$upd->update_id}}</td>
                                    <td><div class="height-content">{{$upd->PIC}}</div></td>
                                    <td>{{$upd->update_no}}</td>
                                    <td><div class="height-content">{{$upd->version_no}}</div></td>
                                    <td><div class="height-content">{{$upd->update_nama}}</div></td>
                                    <td><div class="height-content">{{$upd->update_area}}</div></td>
                                    <td><div class="height-content">{!!$upd->update_desc!!}</div></td>
                                    <td><div class="height-content">{{$upd->update_image}}</div></td>
                                    <td>{{$upd->member->name}} ({{$upd->member->member_id}})</td>
                                    <td>{{$upd->update_tgl->format('d-m-Y')}}</td>
                                    <td>
                                        <a href="{{ route('edit-update', $upd->update_id) }}">
                                            <button type="button" class="btn btn-success">EDIT</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('hapus-update', $upd->update_id)}}" onclick="return confirm('Anda yakin ingin menghapus data update ini?')">
                                            <button type="button" class="btn btn-danger">Hapus</button>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Update table end -->
</div>
@endif
@endsection
