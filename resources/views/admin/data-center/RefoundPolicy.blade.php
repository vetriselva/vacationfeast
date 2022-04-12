@extends('layouts.new-app')

@section('content')

    <div class="card  shadow-hover p-3 ps-4">
        <div class="card-body"> 
            <div class="row border-bottom mb-4">
                <div class="col p-0">
                    <h4>Refund Policy Data Center</h3>
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
                        <th>Point</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($hot)
                        @foreach ($hot as $index => $row)
                        <tr>
                            <td>{{ $index +1 }}</td>
                            <td>{{ Str::limit($row->point, 100) }}</td>
                            <td>
                                <a data-toggle="modal" class="btn btn-sm rounded-pill bg-light text-primary" data-target="#Add_Hotels_edit_model__{{ $index +1 }}"><i data-feather="edit"></i></a>
                                <div class="modal fade" id="Add_Hotels_edit_model__{{ $index +1 }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog  modal-lg">
                                        <form  action="{{ route("data.itinerary.update",['id' => $row->id,'type' => 'Refound_Policy_update']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel"><b>Edit Form</b></h5>
                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div> 
                                                    <div class="row">
                                                        @csrf
                                                        <div class="col-md-12 my-3">
                                                            <small>Point</small>
                                                            <input type="text" name="point" value="{{ $row->point }}" class="mt-2 form-control "   required>
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
                                </div>
                                <!-- Button trigger modal -->
                                <a class="btn btn-sm rounded-pill bg-light text-danger" data-toggle="modal" data-target="#Hotels__{{ $index +1 }}"><i data-feather="trash-2"></i></a>
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
                                                <a href="{{ route('activity-delete', ['id' => $row->id,'type' => 'Refound_Policy_delete'] ) }}" class="btn btn-primary rounded-pill">
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
            <form  action="{{ route("data.itinerary",['type' => 'Refound_Policy_store']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b>Create Form</b></h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div > 
                        <div class="row">
                            @csrf
                            <div class="col-12 my-3">
                                <small>Point</small>
                                <input type="text" name="point" class="mt-2 form-control "  required>
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