<nav class="pc-sidebar ">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('home') }}" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <img src="{{ asset('public/assets/images/text-logo-white.png') }}" alt="" width="200px" class="logo logo-lg">
                <img src="{{ asset('public/assets/images/text-logo-white.png') }}" alt="" class="logo logo-sm">
            </a>
        </div>
        <div class="navbar-content"> 
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Menus</label>
                </li>
                <li class="pc-item {{ Route::is(["AdminDashboard","home"]) ? "active" : "" }}">
                    <a href="{{  route('AdminDashboard')}}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">home</i></span><span class="pc-mtext">Dashboard</span></a>
                </li>
                <li class="pc-item {{ Route::is("lead") ? "active" : "" }}">
                    <a href="{{ route('lead') }}" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">business_center</i></span><span class="pc-mtext">Lead</span></a>
                </li>
                <li class="pc-item {{ Route::is("lead-new") ? "active" : "" }}">
                    <a href="{{ route('lead-new') }}" class="pc-link "><span class="pc-micon"><i data-feather="plus"></i></span><span class="pc-mtext">Create Lead</span></a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Data Center</label>
                </li> 
                
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">settings</i></span><span class="pc-mtext">Flights & Hotels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ Request::route('type')  == 'Hotels' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Hotels']) }}">Hotels Details</a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Flights' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Flights']) }}">Flights Details</a></li> 
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">map</i></span><span class="pc-mtext">locations</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ Request::route('type')  == 'State' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'State']) }}"> State </a></li>
                        <li class="pc-item {{ Request::route('type')  == 'City' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'City']) }}"> City </a></li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i class="material-icons-two-tone">image</i></span><span class="pc-mtext">Itinerary</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ Request::route('type')  == 'Place' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Place']) }}"> Day </a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Activities' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Activities']) }}"> Day activity  </a></li>
                        <li class="pc-item {{ Request::route('type')  == 'DayActivities' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'DayActivities']) }}"> Sightseeing </a></li> 
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link "><span class="pc-micon"><i data-feather="target"></i></span><span class="pc-mtext">Terms & Conditions</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item {{ Request::route('type')  == 'Package_Inclusions' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Package_Inclusions']) }}">Package Inclusions</a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Package_Exclusions' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Package_Exclusions']) }}">Package Exclusions</a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Payment_Policy' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Payment_Policy']) }}">Payment Policy</a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Refound_Policy' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Refound_Policy']) }}">Refund Policy</a></li>
                        <li class="pc-item {{ Request::route('type')  == 'Cancel_Policy' ? "active" : "" }}"><a class="pc-link" href="{{ route("data-center", ['type' => 'Cancel_Policy']) }}">Cancellation Policy</a></li>
                    </ul>
                </li> 
                <li class="pc-item {{ Request::route('type')  == 'Configs' ? "active" : "" }}">
                    <a href="{{ route("data-center", ['type' => 'Configs']) }}" class="pc-link "><span class="pc-micon"> <i class="fa fa-university" aria-hidden="true"></i></span><span class="pc-mtext">Bank Details</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>