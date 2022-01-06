@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<link href="{{url('css/datatable.css')}}" rel="stylesheet">
<!--end of page level css-->

<!-- begining of page level js -->
<script type="text/javascript" src="{{url('vendors/datatables/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/simple-table.js')}}"></script>
<!-- end of page level js -->

<div class="col-lg-12">
    <div class="panel ">
        <div class="panel-heading text-primary">
            <h3 class="panel-title">
                <i class="ti-user"></i> Daftar Kontributor
            </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $mem)
                        <tr>
                            <td>{{$index++}}</td>
                            <td>{{$mem->name}}</td>
                            <td>{{$mem->created_at->isoformat('dddd, D MMMM Y')}} ({{$mem->created_at->diffForHumans()}})</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">{{$member->links()}}</div>
            </div>
        </div>
    </div>
</div>

@endsection