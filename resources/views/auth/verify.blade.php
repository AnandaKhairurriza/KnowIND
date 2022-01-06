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

<script type="text/javascript">
    $( document ).ready(function() 
    {
        $('#modal-verifikasi').modal('show');
    });
</script>

<div id="modal-verifikasi" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">              
                <h4 class="modal-title"><b>Verifikasi Email</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">

                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (session('resent'))
                                        <div class="alert alert-success" role="alert">
                                            Verifikasi telah dikirim ke email anda.
                                        </div>
                                    @endif
                                    Sebelum melanjutkan, mohon untuk cek email anda untuk memverifikasi email!
                                    <br>
                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <div class="text-center">
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Klik disini untuk kirim ulang</button>.</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div> 


@endsection
