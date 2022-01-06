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
<link href="{{url('css/custom_css/dashboard1.css" rel="stylesheet')}}" type="text/css"/>
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

@guest
<!--CONTENT-->
<div class="row">
    <div class="col-md-5 col-md-offset-3" >
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-lock"></i> Reset Password
                </h3>
            </div>
            <div class="panel-body" style="margin-left: 20px">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div>
                        Masukkan email yang didaftarkan untuk me-reset password!                
                    </div>
                    <br>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-11">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>           
            </div>
        </div>
    </div>
</div>
@else
<script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modal-daftar').modal('show');
    });
</script>
@endguest
<div class="modal fade" id="modal-daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Akses Ditolak!</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">Anda sudah mendaftar sebagai kontributor!</div>
      <div class="modal-footer">
        <a href="{{ route('home')}}"><button type="button" class="btn btn-primary">OK</button></a>
      </div>
    </div>
  </div>
</div>
@endsection