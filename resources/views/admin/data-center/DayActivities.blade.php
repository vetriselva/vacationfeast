@extends('layouts.new-app')

@section('content')

    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h4>Sightseeing</h3>
                </div>
                <div class="col">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary rounded-pill mb-3" data-toggle="modal" data-target="#Add_Hotels_model">
                            <i class="fa fa-plus ms-1 text-white"></i> Create
                        </button> 
                    </div>
                </div>
            </div> 
            <table id="hotel-table" class="table   table-hover my-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Sightseeing</th>
                        <th>Image </th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hot)
                        @foreach ($hot as $index => $row)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ $row->state->state_name }}</td>
                            <td>{{ $row->city->city_name }}</td>
                            <td>{{ $row->title }}</td>
                            <td><img src="{{ $row->image }}" alt="" width="50px" height="20px"></td>
                            <td>
                                <a href="{{route('edit-dayactivity',$row->id)}}" class="btn-light border btn btn-sm rounded-pill text-primary"><i data-target="dayActivityModal" data-feather="edit"></i></a>
                                <!-- Button trigger modal -->
                               <a  class=" btn-light border btn btn-sm text-danger rounded-pill" data-toggle="modal" data-target="#Hotels__{{ $index +1 }}"><i data-feather="trash-2"></i></a> 
                                <!-- Modal -->
                                <div class="modal fade" id="Hotels__{{ $index +1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="staticBackdropLabel"><b>Are you Sure!</b></h4>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                want to delete  <strong>{{ $row->packageName }}</strong> Entry !
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light rounded-pill" data-dismiss="modal">Close</button>
                                                <a href="{{ route('activity-delete', ['id' => $row->id,'type' => 'DayActivities_delete'] ) }}" class="btn btn-primary rounded-pill">
                                                    Yes! Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody> 
            </table> 
        </div>
    </div> 
    <div id="dayActivityModalAppend"></div>
    <!-- Modal -->
    <div ng-controller="DayActivity">
        <div class="modal fade" id="Add_Hotels_model" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg">
                <form  action="{{ route("data.itinerary",['type' => 'DayActivites_store']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"><b>Create Form</b></h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div > 
                            <div class="row">
                                @csrf
                            
                                <div class="col-6 my-3">
                                    <small>State </small>
                                    <select name="state_id" id="state_id" class="form-control mt-2"  get-cities ng-model="I.StateName">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                        <option value="{{$state->id}}">{{$state->state_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="col-6 my-3">
                                    <small>City </small>
                                    <select class="form-control  form-control-sm my-2 mt-3"  name="city_id" ng-model="I.CityName" required>
                                        <option value="">Select City</option>
                                        <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                            @{{ City.city_name }}
                                        </option>
                                    </select>
                                </div>

                                <div class="col-6 my-3">
                                    <small>Sightseeing</small>
                                    <input type="text" name="title" class="mt-2 form-control "  required>
                                </div> 
                                <div class="col-6 my-3">
                                    <small>Image URL</small>
                                    <input type="file" name="image" class="mt-2 form-control "  required>
                                </div>
                                <div class="col-12 my-3">
                                    <small>Content</small>  
                                    <textarea  name="content" class="mt-2 form-control " required></textarea>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light rounded-pill" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white mr-2"></i>Sumbit & Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
