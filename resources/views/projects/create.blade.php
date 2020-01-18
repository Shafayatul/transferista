@extends('layouts.app')
@section('backend-additional-css')

@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Transferista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('project') }}">
                        @csrf
                        @include('projects.form', ['formMode' => 'create'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('backend-additional-js')
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGgNecpav_4MaZdtBjZVSlJhYodFX-PUo&libraries=places"></script> -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGgNecpav_4MaZdtBjZVSlJhYodFX-PUo&libraries=places"></script>
<script>
    var input = document.getElementById('searchTextField');
    alert(input);
    function initialize() {
      	var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            alert(place);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@endsection