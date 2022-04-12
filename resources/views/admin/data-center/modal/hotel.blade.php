@extends('layouts.new-app')

@section('content')
<form  action="{{ route("data.itinerary.update",['id' => $hot->id,'type' => 'Hotel_update']) }}" method="POST" enctype="multipart/form-data" class="modal-content">
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
                    <input type="text" name="name" value="{{ $hot->name }}" class="mt-2 form-control "   required>
                </div>
                <div class="col-md-6 my-3">
                    <small>Hotel Location</small>
                    <input type="text" name="location" value="{{ $hot->location }}" class="mt-2 form-control "   required>
                </div>
                <div class="col-12 my-3">
                    <div ><small>Hotel View</small></div>
                    <input type="file" name="image" value="{{ $hot->image }}" class="mt-2 form-control "   >
                   <br>
                   <div class="text-center">
                    <img src="{{ $hot->image }}" width="280px">
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
@endsection
@push('scripts')
<script>
   
    $(document).ready(function(){

        let state = {!! json_encode( $hot->state->toArray() ) !!}
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

        let city = {!! json_encode( $hot->city->toArray() ) !!}
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
</script>

@endpush
