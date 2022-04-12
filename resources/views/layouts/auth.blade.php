<!DOCTYPE html>
<html lang="en">

<head>
    <title>DashboardKit Bootstrap 5 Admin Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="DashboardKit is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
    <meta name="keywords" content="DashboardKit, Dashboard Kit, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Free Bootstrap Admin Template">
    <meta name="author" content="DashboardKit ">
 	<!-- Favicon icon -->
     <link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

     <!-- font css -->
     <link rel="stylesheet" href="{{ asset('public/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/material.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">
 
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}" id="main-style-link">

     <style>
         .alert {
            position: fixed !important;
            top: 30px;
            left: 50%;
            max-width: 350px !important;
            transform: translate(-50%,-50%);
            z-index: 111111111111111111111111 !important;
        }
     </style>
</head>
<body>
    @if ($message = Session::get('error'))
        <div id="hideme" class="alert shadow-sm alert-warning alert-dismissible fade show " role="alert">
            <strong class="y-center">  
                <i class="fa fa-exclamation-circle text-warning alert-icon"></i> 
                {{$message}}
            </strong> 
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($message = Session::get('success'))
        <div id="hideme" class="alert shadow-sm alert-success alert-dismissible fade show" role="alert">
            <strong class="y-center">
                <i class="fa fa-check-circle text-success alert-icon"></i> 
                {{$message}} 
            </strong>
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="auth-wrapper">
        <div class="auth-content">
            @yield('content')
        </div>
    </div>
</body>
 

<script src="{{asset("public/assets/js/vendor-all.min.js")}}"></script>
<script src="{{asset("public/assets/js/plugins/bootstrap.min.js")}}"></script>
<script src="{{asset("public/assets/js/plugins/feather.min.js")}}"></script>
<script src="{{asset("public/assets/js/pcoded.min.js")}}"></script> 

</html>
