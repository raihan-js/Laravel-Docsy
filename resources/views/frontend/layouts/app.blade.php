<!DOCTYPE html> 
<html lang="en">
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>@yield('title', 'Docsy')</title>
		
		<!-- Favicons -->
		<link type="image/x-icon" href="{{ asset('frontend/assets/img/docsyfavicon.png') }}" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">

		{{-- datetimepicker css --}}
		<link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap-datetimepicker.min.css')}}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('frontend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/assets/plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
	</head>
	<body>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			@include('frontend.layouts.header')
			<!-- /Header -->
			
			@section('main')
            @show
			
			<!-- Footer -->
			@include('frontend.layouts.footer')
			<!-- /Footer -->
		   
	   </div>
	   <!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

		<!--Bootstrap Datetime picker -->
		<script src="{{ asset('frontend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

		
		<!-- Slick JS -->
		<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>

		<!-- Sticky Sidebar JS -->
        <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
        <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
		


		
	</body>

<!-- doccure/  30 Nov 2019 04:11:53 GMT -->
</html>