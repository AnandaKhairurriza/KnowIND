@extends('template')

@section('content')

<!--page level css -->
<link rel="stylesheet" href="{{url('css/custom_css/form2.css')}}">
<link rel="stylesheet" href="{{url('css/custom_css/form3.css')}}">
<link rel="stylesheet" href="{{url('css/passtrength/passtrength.css')}}">
<link rel="stylesheet" href="{{url('vendors/bootstrapvalidator/css/bootstrapValidator.min.css')}}">
<link rel="stylesheet" href="{{url('vendors/datetime/css/jquery.datetimepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/sweetalert2/css/sweetalert2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/formelements.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/datepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/airdatepicker/css/datepicker.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/bootstrap-multiselect/css/bootstrap-multiselect.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/iCheck/css/all.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/iCheck/css/line/line.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/select2/css/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/select2/css/select2-bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/selectize/css/selectize.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/selectric/css/selectric.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/selectize/css/selectize.bootstrap3.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/custom_css/dashboard1.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/bootstrap-fileinput/css/fileinput.min.css')}}" media="all">

<link rel="stylesheet" type="text/css" href="{{url('vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/trumbowyg/css/trumbowyg.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('css/form_editors.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('vendors/summernote/summernote.css')}}" media="screen">
<!--end of page level css-->

<!-- begining of page level js -->
<script src="{{url('js/custom_js/advanceddate_pickers.js')}}"></script>
<script src="{{url('js/custom_js/form_elements.js')}}"></script>
<script src="{{url('js/passtrength/passtrength.js')}}"></script>
<script src="{{url('vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/custom_elements.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/airdatepicker/js/datepicker.en.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/airdatepicker/js/datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrap-fileinput/js/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrap-multiselect/js/bootstrap-multiselect.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/datetime/js/jquery.datetimepicker.full.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/moment/js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/select2/js/select2.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/selectize/js/standalone/selectize.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/selectric/js/jquery.selectric.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/form2.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/form3.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrap-maxlength/js/bootstrap-maxlength.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/card/jquery.card.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/iCheck/js/icheck.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/sweetalert2/js/sweetalert2.min.js')}}"></script>

<script type="text/javascript" src="{{url('vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/trumbowyg/js/trumbowyg.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js')}}"></script>
<script type="text/javascript" src="{{url('vendors/summernote/summernote.min.js')}}"></script>
<script type="text/javascript" src="{{url('js/custom_js/form_editors.js')}}"></script>
<!-- end of page level js -->

@yield('form')

@endsection
