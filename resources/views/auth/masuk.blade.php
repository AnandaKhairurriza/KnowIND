@extends('template')

@section('content')

<!-- global css -->
<link rel="stylesheet" type="text/css" href="css/app.css">
<!-- end of global css -->

<!--page level css -->
<link rel="stylesheet" href="css/custom_css/form2.css">
<link rel="stylesheet" href="css/custom_css/form3.css">
<link rel="stylesheet" href="css/passtrength/passtrength.css">
<link rel="stylesheet" href="vendors/bootstrapvalidator/css/bootstrapValidator.min.css">
<link rel="stylesheet" href="vendors/datetime/css/jquery.datetimepicker.css">
<link rel="stylesheet" type="text/css" href="css/custom.css">
<link rel="stylesheet" type="text/css" href="vendors/sweetalert2/css/sweetalert2.min.css">
<link rel="stylesheet" type="text/css" href="css/formelements.css">
<link rel="stylesheet" type="text/css" href="css/datepicker.css">
<link rel="stylesheet" type="text/css" href="vendors/airdatepicker/css/datepicker.min.css">
<link rel="stylesheet" type="text/css" href="vendors/bootstrap-multiselect/css/bootstrap-multiselect.css">
<link rel="stylesheet" type="text/css" href="vendors/iCheck/css/all.css">
<link rel="stylesheet" type="text/css" href="vendors/iCheck/css/line/line.css">
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendors/select2/css/select2-bootstrap.css">
<link rel="stylesheet" type="text/css" href="vendors/selectize/css/selectize.css">
<link rel="stylesheet" type="text/css" href="vendors/selectric/css/selectric.css">
<link rel="stylesheet" type="text/css" href="vendors/selectize/css/selectize.bootstrap3.css">
<link rel="stylesheet" type="text/css" href="css/custom_css/dashboard1.css">
<link rel="stylesheet" type="text/css" href="vendors/bootstrap-fileinput/css/fileinput.min.css" media="all">
<!--end of page level css-->

<!-- global js -->
<script type="text/javascript" src="js/app.js"></script>
<!-- end of global js -->

<!-- begining of page level js -->
<script src="js/custom_js/advanceddate_pickers.js"></script>
<script src="js/custom_js/form_elements.js"></script>
<script src="js/passtrength/passtrength.js"></script>
<script src="vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="js/custom_js/custom_elements.js"></script>
<script type="text/javascript" src="vendors/airdatepicker/js/datepicker.en.js"></script>
<script type="text/javascript" src="vendors/airdatepicker/js/datepicker.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap-fileinput/js/fileinput.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="vendors/datetime/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript" src="vendors/moment/js/moment.min.js"></script>
<script type="text/javascript" src="vendors/select2/js/select2.js"></script>
<script type="text/javascript" src="vendors/selectize/js/standalone/selectize.min.js"></script>
<script type="text/javascript" src="vendors/selectric/js/jquery.selectric.min.js"></script>
<script type="text/javascript" src="js/custom_js/form2.js"></script>
<script type="text/javascript" src="js/custom_js/form3.js"></script>
<script type="text/javascript" src="vendors/bootstrapvalidator/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
<script type="text/javascript" src="vendors/card/jquery.card.js"></script>
<script type="text/javascript" src="vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="vendors/sweetalert2/js/sweetalert2.min.js"></script>
<!-- end of page level js -->

<!--CONTENT-->
<div class="row">
    <div class="col-md-6 col-md-offset-3" >
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-fw ti-lock"></i> Sign In
                </h3>
            </div>
            <div class="panel-body" style="margin-left: 20px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-3 control-label">
                                Email
                            </label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            <!--
                                @error('email')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 control-label">
                                Password
                            </label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <!--
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            -->
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    MASUK!
                                </button>

                                 @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('reset-email') }}">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>                
            </div>
        </div>
    </div>
</div>
@endsection