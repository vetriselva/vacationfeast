<!DOCTYPE html>
<html lang="en">

<head>
    <title>Itinerary application | Vecation Feast</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
 
    <link rel="icon" href="{{ asset('public/assets/images/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset("public/node_modules/line-awesome/dist/line-awesome/css/line-awesome.min.css")}}">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/material.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}" id="main-style-link">
    <link href="{{ asset('public/css/print.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/css/custom.css') }}" rel="stylesheet"> 
    <link href="{{ asset('public/select2/select2.css')}}" rel="stylesheet" type="text/css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">

    <script src="{{asset("public/node_modules/angular/angular.js")}}"></script>
    <script src="{{asset("public/node_modules/angular-aria/angular-aria.js")}}"></script>

    
    <script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>

    
    <style>
        .alert {
            position: fixed !important;
            top: 30px;
            left: 50%;
            max-width: 350px !important;
            transform: translate(-50%,-50%);
            z-index: 111111111111111111111111 !important;
        }
        .table th, .table td {
            padding: 5px !important;
            vertical-align: middle !important;
            text-align: center !important
        }
       
    </style>
    
</head>

<body class="" ng-app="myApp">
    <input type="hidden" name="baseurl" value="{{URL::to('/')}}" id="baseurl">
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
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if ($errors->any())
            <div id="hideme" class="alert shadow-sm alert-warning alert-dismissible fade show " role="alert">
                <strong class="y-center">  
                    <i class="fa fa-exclamation-circle text-warning alert-icon"></i> 
                    @foreach ($errors->all() as $error)
                         {{ $error  }}
                    @endforeach
                </strong> 
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->

	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="{{ asset('public/assets/images/text-logo-white.png') }}" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
			</a>
		 
			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
    @include('includes.side-nav')
	<!-- [ navigation menu ] end -->

	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i class="material-icons-two-tone">search</i>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460__340.png" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name"> {{ Auth::user()->name }}</span>
								<span class="user-desc">Administrator</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons-two-tone">chrome_reader_mode</i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> 
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>
    <div class="pc-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Itinerary Application</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">
                                    {{ Route::is(["AdminDashboard","home"]) ? "Dashboard" : "" }}
                                    {{ Route::is('lead') ? "Leads" : "" }}
                                    {{ Route::is('lead-new') ? "Lead Creation" : "" }}
                                    {{ Request::route('type')  == 'Hotels' ? "Hotels" : "" }} 
                                    {{ Request::route('type')  == 'Flights' ? "Flights" : "" }}
                                    {{ Request::route('type')  == 'State' ? "State" : "" }}
                                    {{ Request::route('type')  == 'City' ? "City" : "" }}
                                    {{ Request::route('type')  == 'Place' ? "Day" : "" }}
                                    {{ Request::route('type')  == 'Activities' ? "Day Activities" : "" }}
                                    {{ Request::route('type')  == 'DayActivities' ? "Sightseeing" : "" }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
             
            <div class="my-md-5 mt-3"></div>
            @yield('content')
        </div>
    </div>
 
    <!-- Required Js -->
 
    

    <script src="{{asset("public/assets/js/vendor-all.min.js")}}"></script>
    <script src="{{asset("public/assets/js/plugins/bootstrap.min.js")}}"></script>
    <script src="{{asset("public/assets/js/plugins/feather.min.js")}}"></script>
    <script src="{{asset("public/assets/js/pcoded.min.js")}}"></script> 


    @if (Route::is(['AdminDashboard','home']))
        <script src="{{asset("public/assets/js/plugins/apexcharts.min.js")}}"></script>
        <script src="{{asset("public/assets/js/pages/dashboard-sale.js")}}"></script>
    @endif

    <script src="{{asset("public/js/app.js")}}"></script>
    <script src="{{asset("public/js/admin/lead.js")}}"></script>

 
    @stack("scripts")
    <script>
        $(document).ready(function(){
            $("#hideme").delay(5000).slideUp(300);
        });
    </script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset("public/js/table.js")}}"></script>
    <script type="text/javascript" src="{{ asset('public/select2/select2.min.js')}}"> </script>

</body>

</html>
