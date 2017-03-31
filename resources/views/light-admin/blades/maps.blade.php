@extends('light-admin.master')
@section('content')
<div id="map"></div>
@stop
@push('scripts')
<!--   Core JS Files   -->
<script src="{{ asset('light-admin/assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
<script src="{{ asset('light-admin/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="{{ asset('light-admin/assets/js/bootstrap-checkbox-radio-switch.js') }}"></script>

<!--  Charts Plugin -->
<script src="{{ asset('light-admin/assets/js/chartist.min.js') }}"></script>

<!--  Notifications Plugin    -->
<script src="{{ asset('light-admin/assets/js/bootstrap-notify.js') }}"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="{{ asset('light-admin/assets/js/light-bootstrap-dashboard.js') }}"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="{{ asset('light-admin/assets/js/demo.js') }}"></script>

<script>
	$().ready(function(){
		demo.initGoogleMaps();
	});
</script>
@endpush