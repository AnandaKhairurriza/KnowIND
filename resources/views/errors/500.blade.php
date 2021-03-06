<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title>500 KnowIND</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/KnowINDIcon.ico"/>

    <!-- global level css -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- end of global css-->
    <!-- page level styles-->
    <link href="{{url('css/404.css')}}" rel="stylesheet">
    <!-- end of page level styles-->

    <!-- global js -->
    <script src="{{url('js/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- end of global js -->
    <script type="text/javascript">
        //=================Preloader===========//
        $(window).on('load', function () {
            $('.preloader img').fadeOut();
            $('.preloader').fadeOut();
        });
        //=================end of Preloader===========//
    </script>    
</head>

<body class="bg-500">
<div class="preloader">
    <div class="loader_img"><img src="img/loader.gif" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
            <div class="text-center">
                <div class="error_msg">
                    <img src="{{url('img/pages/500.gif')}}" alt="500 error image">
                </div>
                <hr class="seperator">
                <a href="javascript:history.back()" class="btn btn-primary link-home">Kembali!</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
