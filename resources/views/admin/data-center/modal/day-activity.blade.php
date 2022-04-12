@extends('layouts.new-app')

@section('content')
    <div class="py-4 pt-0">
        <form id="dayActivityId" action="{{ route("data.itinerary.update",['id' => $dayActivity->id,'type' => 'DayActivities_update']) }}" method="POST" enctype="multipart/form-data">
            <h5 id="staticBackdropLabel"><b>Edit Sightseeing Form</b></h5>
            
                <div class="row">
                    @csrf
                    <div class="col-4 my-3">
                        <small>State </small>
                        <select name="state_id" id="state_id" class="form-control mt-2"></select>
                    </div>
                    <div class="col-4 my-3">
                        <small>City </small>
                        <select class="form-control city form-control-sm my-2 mt-3" id="city" name="city_id"  required></select>
                    </div> 
                    <div class="col-4 my-3">
                        <small>Sightseeing</small>
                        <input type="text" name="title" class="form-control " value="{{$dayActivity->title}}"  required>
                    </div> 
                    <div class="col-4  my-3">
                        <div class="mb-1"><small>Image URL</small></div> 
                        <div class="card">
                            <div class="card-header">
                                <input type="file" name="image" value="{{ $dayActivity->image }}" class="mt-2 form-control"  >
                            </div>
                            <div class="card-body">
                                <img src="{{ $dayActivity->image }}" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-8 my-3">
                        <small>Content</small>
                        <textarea name="content" class="mt-2 form-control" cols="30" rows="10" required>{{$dayActivity->content}}</textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary rounded-pill" type="submit"><i class="fa fa-save text-white mr-2"></i> Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
<script>
   
    $(document).ready(function(){

        let state = {!! json_encode( $dayActivity->state->toArray() ) !!}
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

        let city = {!! json_encode( $dayActivity->city->toArray() ) !!}
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
