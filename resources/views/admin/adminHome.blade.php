@extends('layouts.new-app')

@section('content')

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- support-section start -->
        <div class="col-xl-6 col-md-12">
            <div class="card flat-card">
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">group</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>1000</h5>
                                <span>Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">language</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>$1252</h5>
                                <span>Revenue</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">unarchive</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>600</h5>
                                <span>Growth</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-table">
                    <div class="col-sm-6 card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">swap_horizontal_circle</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>3550</h5>
                                <span>Returns</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 d-none d-md-table-cell d-lg-table-cell d-xl-table-cell card-body br">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">cloud_download</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>3550</h5>
                                <span>Downloads</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <i class="material-icons-two-tone text-primary mb-1">shopping_cart</i>
                            </div>
                            <div class="col-sm-8 text-md-center">
                                <h5>100%</h5>
                                <span>Order</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="{{ asset('public/assets/welcome.jpg') }}" width="100%" alt="s">
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Department wise monthly sales report</h5>
                </div>
                <div class="card-body">
                    <div class="row pb-2">
                        <div class="col-auto m-b-10">
                            <h4 class="mb-1">$21,356.46</h3>
                            <span>Total Sales</span>
                        </div>
                        <div class="col-auto m-b-10">
                            <h4 class="mb-1">$1935.6</h3>
                            <span>Average</span>
                        </div>
                    </div>
                    <div id="account-chart"></div>
                </div>
            </div>
        </div> 
    </div>
    <!-- [ Main Content ] end -->
 @endsection
