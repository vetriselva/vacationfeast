@extends('layouts.new-app')
@section('title') Lead List @endsection
@section('content') 
    <div class="mb-3">
        <a href="{{ route("lead-new") }}" class="btn  btn-primary rounded-pill shadow-hover">
            <i class="fa fa-plus text-white mr-2"></i> Create New Lead
        </a>
    </div>
    <div class="card mb-3">
        <div class="card-body ">            
            <div class="">
                <table id="data-table" class="table table-hover my-5 py-4" style="width:100%">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>App Lead Number</th>
                            <th>Zoho Lead Number</th>
                            <th>Itinerary Date</th>
                            <th>Valid Date</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $index => $row)
                            <tr>
                                <td>{{ $index +1 }}</td>
                                <td>VFI-D-0{{ $row->id }}</td>
                                <td>{{ $row->leadNumber }}</td>
                                <td>{{ date('Y-m-d', strtotime($row->itDate)) }}</td>
                                <td>{{ date('Y-m-d', strtotime($row->itValidDate))  }} </td>
                                <td>{{ $row->created_at->format('Y-m-d') }}</td>
                                <td>
                                    {{-- <a  href="{{ route("lead-view", $row->id) }}" ><i class="fa fa-eye btn btn-sm btn-light border text-primary rounded-pill"></i></a> --}}
                                    <a  href="{{ route("lead-download", $row->id) }}" class="btn btn-sm btn-primary  border text-primary rounded-pill"><i class="material-icons-two-tone text-white">download</i>  </a>
                                    <a class="btn btn-sm btn-light border text-danger rounded-pill" data-toggle="modal" data-target="#staticBackdrop__{{ $index +1 }}"><i data-feather="trash-2"></i></a>
                                
                                    <div id="staticBackdrop__{{ $index +1 }}" class="modal fade" tabindex="-1" aria-labelledby="staticBackdrop__{{ $index +1 }}" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title h3" id="staticBackdropLabel"><b>Are you Sure!</b></h4>
                                                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Want to delete Lead ({{ $row->leadNumber }})  - Entry !</h4>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light border rounded-pill" data-dismiss="modal">Close</button>
                                                    <a href="{{ route("lead-delete", $row->id) }}" class="btn btn-danger rounded-pill">
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
    </div> 
    <br>
    
@endsection


 