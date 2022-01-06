@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" href="{{url('css/custom_css/form2.css')}}"/>
<link rel="stylesheet" href="{{url('css/custom_css/form3.css')}}"/>
<link rel="stylesheet" href="{{url('css/passtrength/passtrength.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/sweetalert2/css/sweetalert2.min.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{url('css/formelements.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/datepicker.css')}}">
<link rel="stylesheet" href="{{url('vendors/datetime/css/jquery.datetimepicker.css')}}">
<link href="{{url('vendors/airdatepicker/css/datepicker.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}" rel="stylesheet">
<link href="{{url('vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{url('vendors/bootstrap-multiselect/css/bootstrap-multiselect.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css">
<Link href="{{url('vendors/iCheck/css/line/line.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/select2/css/select2-bootstrap.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/selectize/css/selectize.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/selectric/css/selectric.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('vendors/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css">
<link href="{{url('css/custom_css/dashboard1.css')}}" rel="stylesheet" type="text/css"/>
<!--end of page level css-->

<!-- begining of page level js -->
<script src="{{url('js/custom_js/advanceddate_pickers.js')}}"></script>
<script src="{{url('js/custom_js/custom_elements.js')}}" type="text/javascript"></script>
<script src="{{url('js/custom_js/form_elements.js')}}"></script>
<script src="{{url('js/passtrength/passtrength.js')}}"></script>
<script src="{{url('vendors/airdatepicker/js/datepicker.en.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/airdatepicker/js/datepicker.min.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/bootstrap-fileinput/js/fileinput.min.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/iCheck/js/icheck.js')}}"></script>
<script src="{{url('vendors/moment/js/moment.min.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/select2/js/select2.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/selectize/js/standalone/selectize.min.js')}}" type="text/javascript"></script>
<script src="{{url('vendors/selectric/js/jquery.selectric.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('js/custom_js/form2.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/form3.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/card/jquery.card.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>
<!-- end of page level js -->

@error('#')
<script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modal-password').modal('show');
    });
</script>
@enderror
<!--CONTENT-->
<div class="row">
    <div class="col-md-6 col-md-offset-3" >
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-user"></i> Edit Akun
                </h3>
            </div>
            <div class="panel-body" style="margin-left: 10px">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li><b>- {{ $error }}</b></li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              @if(session('updateakun'))
                <div class="alert alert-success">{{session('updateakun')}}</div>
              @elseif(session('updatepassword'))
                <div class="alert alert-success">{{session('updatepassword')}}</div>
              @endif
              <form action="{{ route('update-akun') }}" method="POST" enctype="multipart/form-data">   
                {{csrf_field()}}
                  <div class="form-group">
                    <input name="id" value="{{$id}}" hidden>
                    <label class="col-md-12 control-label"><b>Username</b></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$username}}" maxlength="25" placeholder="(Max : 25 Karakter!)" required autocomplete="name" autofocus>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label"><b>Email</b></label>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$email}}" required autocomplete="email">
                  </div>
                  <a href="#modal-password" data-toggle="modal"><b>Edit Password</b></a>
                  <br>
                  <br>

                  <div class="form-group">
                      <div>
                        @if(Auth::user()->avatar == NULL)
                          <img src="{{ url('/file/avatar/default.png')}}" alt="Image not found!" style="border: 3px solid lightgray; border-radius: 8px;  max-width: 300px; max-height: 300px;">
                        @else
                          <img src="{{ url('/file/avatar/'.$id.'/'.$avatar)}}" alt="Image not found!" style="border: 3px solid lightgray; border-radius: 8px;  max-width: 300px; max-height: 300px;">
                        @endif
                          <br>
                          <b>Current Avatar</b>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-md-12 control-label" for="avatar">
                          <b>Profile Picture<b>
                      </label>
                      <div>
                          <input id="input-21" type="file" accept="image/*" class="file-loading" name="avatar">
                      </div>
                      <div>
                          Support extension : <b> bmp, gif, ico, jfif, jpeg, jpg, pjp, pjpeg, png, svg, svgz, tif, tiff, webp, xbm
                      </div>
                  </div>

                  <button type="submit" class="btn btn-primary">
                  Update!
                  </button>
                </form>     
            </div>
        </div>
    </div>
</div>

<div id="modal-password" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title">Edit Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('update-password')}}">
                    @csrf
                    <input name="id" value="{{$id}}" hidden>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" type="password" class="form-control" name="password_lama" placeholder="Password Lama" required> 
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" type="password" class="form-control" name="password_baru" placeholder="Password Baru" required> 
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock"></i>
                        <input id="password" type="password" class="form-control" name="konfirm_password" placeholder="Konfirm Password" required> 
                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                            Update!
                        </button>
                    </div>
                </form>             
            </div>
        </div>
    </div>
</div> 

@endsection