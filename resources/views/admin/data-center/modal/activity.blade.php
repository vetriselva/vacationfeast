@extends('layouts.new-app')

@section('content')
 
    <form  id="activityId" action="{{ route("data.itinerary.update",['id' => $activity->id,'type' => 'Activities_update']) }}" method="POST" enctype="multipart/form-data">
        <h5 id="staticBackdropLabel"><b>Edit Day Activity Form</b></h5>
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

                <div class="col-6 my-3">
                    <small>Day Activity</small>
                    <input type="text" name="title" class="mt-2 form-control " value="{{$activity->title}}"  required>
                </div>
                <div class="col-12 my-3">
                    <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white mr-2"></i> Update</button>
                </div>
            </div>
        </div> 
    </form>
   
@endsection
@push('scripts')
<script>
   
    $(document).ready(function(){
        
        let state = {!! json_encode( $activity->state->toArray() ) !!}
        var newOption = new Option(state.state_name, state.id, false, false);
        $('#state_id').append(newOption).trigger('change'); 
        let city = {!! json_encode( $activity->city->toArray() ) !!}
        
        var newOption = new Option(city.city_name, city.id, false, false);
        $('#city').append(newOption).trigger('change');
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
