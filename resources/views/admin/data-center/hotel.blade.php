@extends('layouts.new-app')

@section('content')

    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h4>Hotels Data Center</h3>
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
                        <th>Hotel Name</th>
                        <th>Hotel View</th>
                        <th>location</th>
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
                            <td>{{ $row->name }}</td>
                            <td><img src="{{ $row->image }}" alt="" width="50px" height="20px"></td>
                            <td>{{ $row->location }}</td>
                            <td>
                                <a href="{{route('edit-hotel',$row->id)}}" data-toggle="modal" class="rounded-pill btn btn-sm btn-light border text-primary"> <i  data-feather="edit"></i></a>
                                {{-- <div class="modal fade" id="Add_Hotels_edit_model__{{ $index +1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg">
                                        <form  action="{{ route("data.itinerary.update",['id' => $row->id,'type' => 'Hotel_update']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><b>Edit Form</b></h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div> 
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-6 my-3">
                                                            <small>State </small>
                                                            <select name="state_id" id="state_id" class="form-control mt-2">
                                                            </select>
                                                        </div>
                                                        <div class="col-6 my-3">
                                                            <small>City </small>
                                                            <select class="form-control city form-control-sm my-2 mt-3" id="city" name="city_id"  required>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 my-3">
                                                            <small>Hotel Name</small>
                                                            <input type="text" name="name" value="{{ $row->name }}" class="mt-2 form-control "   required>
                                                        </div>
                                                        <div class="col-md-6 my-3">
                                                            <small>Hotel Location</small>
                                                            <input type="text" name="location" value="{{ $row->location }}" class="mt-2 form-control "   required>
                                                        </div>
                                                        <div class="col-12 my-3">
                                                            <div ><small>Hotel View</small></div>
                                                            <input type="file" name="image" value="{{ $row->image }}" class="mt-2 form-control "   >
                                                           <br>
                                                           <div class="text-center">
                                                            <img src="{{ $row->image }}" width="280px">
                                                           </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light rounded-pill" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white mr-2"></i> Save</button>
                                                </div>
                                        </form>
                                    </div>
                                </div> --}}

                                <a class="rounded-pill btn btn-sm btn-light border text-danger" data-toggle="modal" data-target="#Hotels__{{ $index +1 }}"> <i  data-feather="trash-2"></i></a>
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
                                                <a href="{{ route('activity-delete', ['id' => $row->id,'type' => 'Hotel_delete'] ) }}" class="btn btn-primary rounded-pill">
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
    <!-- Modal -->
    <div class="modal fade" id="Add_Hotels_model" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <form  action="{{ route("data.itinerary",['type' => 'Hotel_store']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Create Form</b></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div > 
                        <div class="row">
                            @csrf
                            <div class="col-6 my-3">
                                <small>State </small>
                                <select name="state_id" id="state_id" class="form-control"  get-cities ng-model="I.StateName">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                    <option value="{{$state->id}}">{{$state->state_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 my-3">
                                <small>City </small>
                                <select class="form-control"  name="city_id" ng-model="I.CityName" required>
                                    <option value="">Select City</option>
                                    <option ng-repeat="City in Cities" value="@{{ City.id }}">
                                        @{{ City.city_name }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-6 my-3">
                                <small>Hotel Name</small>
                                <input type="text" name="name" class="mt-2 form-control "  required>
                            </div>
                            <div class="col-md-6 my-3">
                                <small>Loaction</small>
                                <input type="text" name="location" class="mt-2 form-control "   required>
                            </div>
                            <div class="col-md-12 my-3">
                                <small>Image URL</small>
                                <input type="file" name="image" class="mt-2 form-control "   required>
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
    
@endsection

@push('scripts')
{{-- <script>
    $(document).ready(function(){
        let state = {!! json_encode( $hot->state->toArray() ) !!};
        var newOption = new Option(state.state_name, state.id, false, false);
        $('#state_id').append(newOption).trigger('change'); 
        $('#state_id').select2({
            ajax: {
                url : '{{route('get-states')}}',
                data: function (params) {   
                    return { q: params.term}
                },
                processResults: function (data) {
                    $('#city').val('').trigger('change');
                    let res = [];
                    data.forEach(item => {
                        res.push({'id': item.id, 'text': item.state_name});
                    })
                    return { results: res};
                }
            }
        });

        let city = {!! json_encode( $place->city->toArray() ) !!}
        var newOption = new Option(city.city_name, city.id, false, false);
        $('#city').append(newOption).trigger('change');
        $("#city").select2({
            ajax: {
                url : '{{route('get-cities-by-state-id')}}',
                data: function (params) {   
                    return { q: params.term, id: $("#state_id").val() }
                },
                processResults: function (data) {
                
                    let res = [];
                    data.forEach(item => {
                        res.push({'id': item.id, 'text': item.city_name});
                    })
                    return { results: res};
                }
            }
        });
    });
</script> --}}

@endpush