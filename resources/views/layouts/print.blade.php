<!DOCTYPE html>
<html lang="en">

<head>
    <title>DashboardKit Bootstrap 5 Admin Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- Favicon icon -->
    <link rel="icon" href="/assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset("public/node_modules/line-awesome/dist/line-awesome/css/line-awesome.min.css")}}">

    <!-- font css -->
    <link rel="stylesheet" href="/assets/fonts/feather.css">
    <link rel="stylesheet" href="/assets/fonts/material.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="/assets/css/style.css" id="main-style-link">
    <link href="{{ asset('public/css/print.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet"> 
 
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="/assets/fonts/fontawesome.css">
   
</head>

<body class="" ng-app="myApp">
     @yield('content')
</body>

</html>
