@extends('backend.header')
	@include('backend.preloader')
	<div class="ndnapps-wrapper">
		@include('backend.topnav')
		<div class="ndnapps-wrapper-body">
			<div class="col-md-12">
				@include('plan.content')
			</div>
		</div><!--ndnapps-wrapper-body-->
	</div><!--Wrapper-->
	

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{ secure_asset('/public/plan/js/main.js') }}"></script>
<script src="{{ secure_asset('/public/plan/js/modernizr.js') }}"></script>
-->
@extends('backend.footer')