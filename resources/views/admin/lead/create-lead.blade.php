
@extends('layouts.new-app')
@section('title') Lead List @endsection
@section('content') 

<style>
    ul.dropdown-menu li {
        cursor: pointer;
    }

        ul.dropdown-menu li span.red {
            color: red;
        }

        ul.dropdown-menu li span.green {
            color: green;
        }
    .flex-table {
        display: flex;
        width: 100%;
        min-height: 50px;
    }
    .thead .td {
        background: #1C232F;
        border: 1px solid black;
        color: white;
        width: 100%;
        text-align: center;
        align-items: center;
        display: flex;
        justify-content: center
    }
    .thead .td:nth-child(1){
        background: red !important;
        width: 5% !important
    }
    .table-w {
        width: 100px !important;
        min-width: 100px !important;
        max-width: 100px !important;
    }
    .table-w-2 {
        width: 40px !important;
        min-width: 40px !important;
        max-width: 40px !important;
    }
</style>
<form id="lead-create-form" ng-controller="LeadController" ng-submit="submitLead()" method="POST" enctype="multipart/form-data"> @csrf
    <div class="card position-relative my-4 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Basic Information</h4>
        <div class="card-body mt-4">
            <div class="row mb-3"> 
                <div class="col-md-4 my-2">
                    <small class="text-secondary">File Name</small>
                    <input type="text" name="pdf_name" ng-model="basicInformation.pdf_name" class="form-control " required  >
                </div>
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Lead Number</small>
                    <input type="text" name="leadNumber" ng-model="basicInformation.leadNumber" class="form-control " required  >
                </div>
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Main heading</small>
                    <input name="packageName" ng-model="basicInformation.packageName" class="form-control " required  >
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Tour Name</small>
                    <input name="placeToVisit" ng-model="basicInformation.placeToVisit" class="form-control "required>
                </div>
                <div class="col-md-6 my-2">
                    <small class="text-secondary">Places to Visit</small>
                    <input name="subTitle" ng-model="basicInformation.subTitle" class="form-control "required>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Itinerary Date</small>
                    </div>
                    <input type="date" name="itDate" ng-model="basicInformation.itineraryDate"  required class="form-control ">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Valid Date</small>
                    </div>
                    <input type="date" name="itValidDate" ng-model="basicInformation.validDate" required class="form-control ">
                </div> 
                <div class="col-md col-sm-6 my-2">
                    <div>
                        <small class="text-secondary">Departure Date</small>
                    </div>
                    <input type="date" name="departureDate" ng-model="basicInformation.departureDate" required class="form-control ">
                </div> 
            </div>
            <div class="row">
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Number of Night</small>
                    <input   ng-model="basicInformation.numofNights" class="form-control " type="number" name="numOfNights" value="5" required>
                </div>
                <div class="col-md-4 my-2">
                    <small class="text-secondary">Room Type</small>
                    <input ng-model="basicInformation.roomType" class="form-control " name="roomType" value="AC ROOM" required>
                </div>
                <div class="col-md-4 my-2">
                    <div class="mb-2">
                        <small class="text-secondary">Route Map</small>
                    </div>
                    <input type="file" ng-model="basicInformation.RouteMap" file-model = "myFile"  name="RouteMap" id="" ng-required required class="form-control  ">
                </div>
            </div>
        </div>
    </div>
    <div class="card border ml-auto mb-0 col-4">
        <div class="card-body">
            <label for="noneedFlights"> <input class="form-check-input mr-2" type="checkbox" name="no_need_flight" ng-model="no_need_flight" id="noneedFlights"> No Need Filght </label>
        </div>
    </div>
     
     
    <div class="card position-relative mb-5 p-3 border-hover shadow-hover" ng-hide="no_need_flight == true">
        <h4 class="card-title form-title">Flight Details</h4>
        <div class="card-body ">
            <div class="row align-items-center">
                <div class="col p-0">
                    <div>
                        <small class="text-secondary">Flight Name</small>
                    </div>
                    <select name="flight_id" class="form-control " required>
                        @if ($flights)
                            @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}">{{ $flight->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col text-end">
                    <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddFlights()"><i class="fa fa-plus text-white me-1"></i> Add a new flight</a>
                </div>
            </div>

            
            <table class="table   table-hover table-bordered my-4 shadow-sm-hover ">
                <thead  class="bg-light">
                    <tr>
                        <th>S.No</th>
                        <th>FROM</th>
                        <th>TO</th>
                        <th>FLIGHT</th>
                        <th>DATE</th>
                        <th>DEP</th>
                        <th>ARR</th>
                        <th>BAGGAGE</th>
                        <th>REFUNDABLE</th>
                        <th>MEALS</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(index,I) in FlightDetails">
                        <td>@{{ index+1 }}</td>
                        <td><input type="text" name="from" ng-model="I.from" maxlength="15" class="form-control   border-0"></td>
                        <td><input type="text" name="to" ng-model="I.to" maxlength="15"  class="form-control  border-0"></td>
                        <td><input type="text" name="flight" ng-model="I.flight" maxlength="10" class="form-control  border-0"></td>
                        <td><input type="date" name="date" ng-model="I.date"  class="form-control  border-0"></td>
                        <td><input type="text" name="dep" ng-model="I.dep" maxlength="8" class="form-control  border-0"></td>
                        <td><input type="text" name="arr" ng-model="I.arr" maxlength="8" class="form-control  border-0"></td>
                        <td><input type="number" min="1" name="bag" ng-model="I.bag"  class="form-control  border-0"></td>
                        <td><input type="checkbox" name="refound" ng-model="I.refound"  value="1" class="form-check-input  mr-2"></td>
                        <td><input type="checkbox" value="1" class="form-check-input  mr-2" ng-model="I.meals" name="meals[]"></td>
                        <td>
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteFlights(index)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Itinerary Details</h4>
        <div class="card-body p-0">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddItDays()"><i class="fa fa-plus text-white me-1"></i> Add a new day</a>
            </div>
            {{-- <div class="flex-table thead">
                <div class="td">Day</div>
                <div class="td">State </div>
                <div class="td">City </div>
                <div class="td">Places Name</div>
                <div class="td">Day activity</div>
                <div class="td">Sightseeingy</div>
                <div class="td">Action</div>
            </div> --}}
            <table class="table my-4 shadow-sm-hover">
                <thead class="bg-dark text-white"style="padding: 0 !important;border:2px solid #1C232F">
                    <tr class="text-center">
                        <td class="table-w-2">Day</td>
                        <td class="table-w">Country / State</td>
                        <td class="table-w">City</td>
                        <td class="table-w">Day</td>
                        <td class="table-w">Day activity </td>
                        <td class="table-w">Sight seeing</td>  
                        <td class="table-w-2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(index,I) in ItDays" style="padding: 0 !important;border:2px solid #1C232F;border-top : none !important">
                        <td colspan="7">
                            <table class="table table-borderless m-0">
                                <tr class="p-0" style="padding: 0 !important">
                                    <td style="padding:0 !important;" class="text-center table-w-2">
                                        <input type="text" ng-model="I.DayCount"  name="DayCount[]" class="text-center form-control "  ng-value="@{{ index+1 }}">
                                    </td>
                                    <td style="padding:0;" class="table-w px-2">
                                        <select class="form-control"  get-cities name="StateName" ng-model="I.StateName" required>
                                            <option value="">Select State </option>
                                            <option ng-repeat="State in States" value="@{{ State.id }}">
                                                @{{ State.state_name }}
                                            </option>
                                        </select>
                                    </td>
                                    <td style="padding:0;" class="table-w px-2">
                                        <select class="form-control" get-places get-day-activities get-activities name="CityName" ng-model="I.CityName" required>
                                            <option value="">Select City</option>
                                            <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                                @{{ City.city_name }}
                                            </option>
                                        </select>
                                    </td>
                                    <td style="padding:0;" class="table-w px-2">
                                        <select  class="form-control" name="PlaceName" ng-model="I.PlaceName" required>
                                            <option value="">Select Place</option>
                                            <option ng-repeat="Place in Places" value="@{{ Place.id }}">
                                                @{{ Place.place_name }}
                                            </option>
                                        </select>
                                    </td>
                                    <td style="padding:0; "class="table-w px-2">
                                        <select class="form-control" name="Activity" ng-model="I.Activity" required>
                                            <option value="">Select Activity</option>
                                            <option ng-repeat="Activity in Activities" value="@{{ Activity.id }}">
                                                @{{ Activity.title }}
                                            </option>
                                        </select>
                                    </td> 
                                    <td style="padding:0 !important;" class="table-w-2">
                                        <a class="btn-sm btn shadow-hover border rounded-pill" ng-click="DelelteItDays(index)">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>    
                                    </td>                                
                                </tr>
                                <tr>
                                    <td colspan="7" class="p-0">
                                        <dropdown-multiselect model="I.DayActivity" options="dayActivities"></dropdown-multiselect>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="p-0">
                                        <div class="d-flex px-3 w-100 justify-content-between  ">
                                            <div class="d-flex w-100 mr-2 m-0 p-0">
                                                <div class="d-flex align-items-center mr-3"title="Transfers">
                                                    <input class="form-check-input  mr-3"   name="Transfers[]" id="Breattk@{{ index+1 }}" ng-model="I.Transfers" type="checkbox" value="Included">
                                                    <label class="form-check-label" for="Breattk@{{ index+1 }}"><small>Transfers</small></label>
                                                </div>
                                                <div class="d-flex align-items-center mr-3"title="Tickets">
                                                    <input class="form-check-input  mr-3"   name="Tickets[]" ng-model="I.Tickets" id="te@{{ index+1 }}" type="checkbox" value="Included">
                                                    <label class="form-check-label" for="te@{{ index+1 }}"><small>Tickets</small></label>
                                                </div>
                                                <div class="d-flex align-items-center mr-3" title="Breack first">
                                                    <input class="form-check-input  mr-3"   name="breack[]" ng-model="I.Meals.breack" type="checkbox" id="Break@{{ index+1 }}" value="Break fast">
                                                    <label class="form-check-label" for="Break@{{ index+1 }}"><small>Breakfast</small></label>
                                                </div>
                                                <div class="d-flex align-items-center mr-3" title="Lunch"  >
                                                    <input class="form-check-input  mr-3"ng-model="I.Meals.lunch" name="lunch[]" type="checkbox" id="Lunch@{{ index+1 }}" value="Lunch">
                                                    <label class="form-check-label" for="Lunch@{{ index+1 }}"><small>Lunch</small></label>
                                                </div>
                                                <div class="d-flex align-items-center mr-3" title="Dinner">
                                                    <input class="form-check-input  mr-3"ng-model="I.Meals.dinner"  name="dinner[]" type="checkbox" id="Dinner@{{ index+1 }}" value="Dinner" >
                                                    <label class="form-check-label"  for="Dinner@{{ index+1 }}"><small> Dinner</small></label>
                                                </div>       
                                                <input class="form-control btn-light border" placeholder="Notes ..." ng-model="I.others" name="others[]">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>   
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
 
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Hotel Details</h4>
        {{-- <small class="mx-auto text-danger">Mandatory to fill @{{HotalDetails.length}} cost details</small> --}}
        @{{HotalDetails}}
        <div class="card-body ">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddHotalsOption()"><i class="fa fa-plus text-white me-1"></i> Add a new Opition</a>
            </div>
            <table class="table   table-hover table-bordered my-4 shadow-sm-hover" ng-repeat="(index,I) in HotalDetails">
                <thead>
                    <tr class="bg-light">
                        <th colspan="7" class="text-center"> 
                            <strong>OPTION @{{ index+1 }} </strong>
                        </th>  
                        <th class="text-center">
                            <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddHotel(index)"><i class="fa fa-plus text-white"></i> </a>
                        </th>                    
                    </tr>  
                </thead>
                <tbody > 
                    <tr  class="bg-light">
                        <th>S.NO</th>
                        <th>STATE</th>
                        <th>CITY</th>
                        <th>HOTEL</th>
                        <th>ROOM TYPE</th>
                        <th>STAR</th>
                        <th>NIGHT</th>
                        <th>ACTION</th>
                    </tr>
                    <tr ng-repeat="(SecIndex,Cost) in I.Details">
                        <td class="text-center">
                            <input type="hidden" min="1" max="10" maxlength="2" ng-model="Cost.HotelOptionNumber" name="HotelOptionNumber[]" value="@{{ index+1 }}">@{{ SecIndex+1 }}
                        </td>
                        <td style="padding:0;" class="table-w px-2">
                            <select class="form-control"  get-hotel-cities name="StateName" ng-model="Cost.StateName" required>
                                <option value="">Select State </option>
                                <option ng-repeat="State in States" value="@{{ State.id }}">
                                    @{{ State.state_name }}
                                </option>
                            </select>
                        </td>
                        <td style="padding:0;" class="table-w px-2">
                            <select class="form-control" get-hotels  name="CityName" ng-model="Cost.CityName" required>
                                <option value="">Select City</option>
                                <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                    @{{ City.city_name }}
                                </option>
                            </select>
                        </td>
                        {{-- <td><input type="text" ng-model="Cost.city" name="city[]" class="form-control  border-0"></td>
                        
                        <td>
                            <select ng-model="Cost.hotel" name="hotel_id[]" class="form-control border-0">
                                <option value="">-- Choose --</option>
                                @if ($hotels)
                                    @foreach ($hotels as $hotel)
                                        <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </td> 
                         <td><input type="text" ng-model="Cost.hotalRoomType" name="hotal_room_type[]" class="form-control  border-0"></td>
                        --}}
                        <td style="padding:0;" class="table-w px-2">
                            <select class="form-control" get-hotels  name="CityName" ng-model="Cost.hotalRoomType" required>
                                <option value="">Select Hotel</option>
                                <option ng-repeat="Hotel in Hotels" value="@{{ Hotel.name }}">
                                    @{{ Hotel.name }}
                                </option>
                            </select>
                        </td>
                       
                        <td><input type="number" ng-model="Cost.starRating" min="1" max="5" maxlength="2" name="star_ratings[]" class="form-control  border-0"></td>
                        <td><input  type="number" ng-model="Cost.hotalNight" min="1" maxlength="2" name="hotal_night[]" class="form-control  border-0"></td>
                        <td>
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteHotals(index, SecIndex)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>
                </tbody> 
            </table> 
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Cost Details</h4>
        <div class="card-body ">
            <div class="text-end">
                <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="AddCost()"><i class="fa fa-plus text-white me-1"></i> Add a new Opition</a>
            </div>
            <table class="table   table-hover table-bordered my-4 shadow-sm-hover" ng-repeat="(index,I) in CostDetails">
                <thead>
                    <tr class="bg-light">
                        <th colspan="3" class="text-center"> 
                            <strong>OPTION @{{ index+1 }} </strong>
                        </th>  
                        <th class="text-center">
                            <a class="btn btn-sm btn-primary rounded-pill shadow-hover" ng-click="SubAddCost(index)"><i class="fa fa-plus text-white"></i> </a>
                        </th>                    
                    </tr>  
                    <tr class="text-center">
                        <th>Costing Title</th>
                        <th>Members</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="(SecIndex,Cost) in I.Details">
                        <td>
                            <input type="hidden" name="optionNumber[]" value="@{{ index+1 }}">
                            <input placeholder="Type Here.." type="text" ng-model="Cost.costTitle" name="costingFor[]" id="" class="form-control  border-0">
                        </td>
                        <td><input placeholder="Type Here.." type="text" ng-model="Cost.member" name="members[]" id="" class="form-control  border-0"></td>
                        <td><input placeholder="Type Here.." type="number" ng-model="Cost.costTotal"  name="costTotals[]"  class="form-control  border-0"></td>
                        <td class="text-center">
                            <a class="btn-sm btn shadow-hover px-3 rounded-pill" ng-click="DelelteCost(index, SecIndex)">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr> 
                </tbody> 
            </table>
            <label for="" class="mb-2">Notes</label>
            <textarea name="costingNotes" ng-model="basicInformation.costingNote" class="form-control"></textarea>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Inclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group my-3" style="max-height:400px;overflow:auto">
                    <li class="list-group-item p-0 border-bottom shadow-sm-hover"  ng-repeat="(index,packageInclusion) in packageInclusions">
                        <label for="package_inclusions__@{{packageInclusion.id}}" class="list-group-item">
                            <input type="checkbox" ng-model="active" ng-change="changeInclusion(packageInclusion.id, active)" name="pack_incxcluds[]" value="@{{packageInclusion.id}}" class="form-check-input  mr-2" id="package_inclusions__@{{packageInclusion.id}}">
                            <span class="ps-2 text-dark">@{{ packageInclusion.point }}</span>
                        </label>                        
                    </li>
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Package Exclusions</h4>
        <div class="card-body py-4">
            <ul class="list-group my-3" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,packageExclusion) in packageExclusions">
                    <label for="package_exclusions__@{{packageExclusion.id}}" class="list-group-item">
                        <input type="checkbox" ng-model="active" ng-change="changeExclusion(packageExclusion.id, active)" name="pack_excluds[]" value="@{{packageExclusion.id}}" class="form-check-input  mr-2" id="package_exclusions__@{{packageExclusion.id}}">
                        <span class="ps-2 text-dark">@{{ packageExclusion.point }}</span>
                    </label>                        
                </li>
            </ul>
        </div> 
    </div>
    <div class="card position-relative my-5 p-3 border-hover shadow-hover">
        <h4 class="card-title form-title">Terms & Conditions</h4>
        <div class="card-body py-4">
            <h5 class="my-3"><b>PAYMENT POLICY</b></h5>
            <ul class="list-group my-3" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,paymentPolicy) in paymentPolicies">
                    <label for="payment_policy__@{{paymentPolicy.id}}" class="list-group-item">
                        <input type="checkbox" ng-model="active" ng-change="changePaymentPolicy(paymentPolicy.id, active)" name="paymentpolicy[]" value="@{{paymentPolicy.id}}" class="form-check-input  mr-2" id="payment_policy__@{{paymentPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ paymentPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
            <h5 class="tzext-center"><b>REFUND  POLICY</b></h5>
            <ul class="list-group my-3" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,refundPolicy) in refundPolicies">
                    <label for="refund_policy__@{{refundPolicy.id}}" class="list-group-item ">
                        <input type="checkbox" ng-model="active" ng-change="changeRefundPolicy(refundPolicy.id, active)" name="refund_policy[]" value="@{{refundPolicy.id}}" class="form-check-input  mr-2" id="refund_policy__@{{refundPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ refundPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
            <h5 class="my-3"><b>CANCELLATION  POLICY</b></h5>
            <ul class="list-group my-3" style="max-height:400px;overflow:auto">
                <li class="list-group-item p-0 border-bottom shadow-sm-hover" ng-repeat="(index,cancellationPolicy) in cancellationPolicies">
                    <label for="cancellation__@{{cancellationPolicy.id}}" class="list-group-item ">
                        <input type="checkbox" ng-model="active" ng-change="changeCancellationPolicy(cancellationPolicy.id, active)" name="cancellation_policy[]" value="@{{cancellationPolicy.id}}" class="form-check-input  mr-2" id="cancellation__@{{cancellationPolicy.id}}">
                        <span class="ps-2 text-dark">@{{ cancellationPolicy.point }}</span>
                    </label>                        
                </li>
            </ul>
        </div> 
    </div>
    <div class="btn p-0 mb-3">
        <button type="submit"  class="btn btn-primary px-3 rounded-pill">Submit & Save</button>
    </div>
</form>
<style>
    table td {
        padding: 0 !important;
        text-align: center !important;
        vertical-align: middle !important
    }
    table th {
        padding: 3px !important;
        text-align: center !important;
        vertical-align: middle !important
    }
</style>
@endsection
