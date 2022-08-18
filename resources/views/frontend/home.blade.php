@extends('frontend.layouts.app')

@section('main')
	
<!-- Home Banner -->
<section class="section section-search">
	<div class="container-fluid">
		<div class="banner-wrapper">
			<div class="banner-header text-center">
				<h1>Search Doctor, Make an Appointment</h1>
				<p>Discover the best doctors, clinic & hospital the city nearest to you.</p>
			</div>
			 
			<!-- Search -->
			<div class="search-box">
				<form action="templateshub.net">
					<div class="form-group search-location">
						<input type="text" class="form-control" placeholder="Search Location">
						<span class="form-text">Based on your Location</span>
					</div>
					<div class="form-group search-info">
						<input type="text" class="form-control" placeholder="Search Doctors, Clinics, Hospitals, Diseases Etc">
						<span class="form-text">Ex : Dental or Sugar Check up etc</span>
					</div>
					<button type="submit" class="btn btn-primary search-btn"><i class="fas fa-search"></i> <span>Search</span></button>
				</form>
			</div>
			<!-- /Search -->
			
		</div>
	</div>
</section>
<!-- /Home Banner -->
  


<!-- Availabe Features -->
<section class="section section-features">
	<div class="container-fluid">
	   <div class="row">
			<div class="col-md-5 features-img">
				<img src="{{ asset('frontend/assets/img/features/feature.png') }}" class="img-fluid" alt="Feature">
			</div>
			<div class="col-md-7">
				<div class="section-header">	
					<h2 class="mt-2">Available Features in Our Clinic</h2>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
				</div>	
				<div class="features-slider slider">
					<!-- Slider Item -->
					<div class="feature-item text-center">
						<img src="{{ asset('frontend/assets/img/features/feature-01.jpg') }}" class="img-fluid" alt="Feature">
						<p>Patient Ward</p>
					</div>
					<!-- /Slider Item -->
					
					<!-- Slider Item -->
					<div class="feature-item text-center">
						<img src="{{ asset('frontend/assets/img/features/feature-02.jpg') }}" class="img-fluid" alt="Feature">
						<p>Test Room</p>
					</div>
					<!-- /Slider Item -->
					
					<!-- Slider Item -->
					<div class="feature-item text-center">
						<img src="{{ asset('frontend/assets/img/features/feature-03.jpg') }}" class="img-fluid" alt="Feature">
						<p>ICU</p>
					</div>
					<div class="feature-item text-center">
						<img src="{{ asset('frontend/assets/img/features/feature-03.jpg') }}" class="img-fluid" alt="Feature">
						<p>ICU</p>
					</div>
					<div class="feature-item text-center">
						<img src="{{ asset('frontend/assets/img/features/feature-03.jpg') }}" class="img-fluid" alt="Feature">
						<p>ICU</p>
					</div>
					<!-- /Slider Item -->
					
				</div>
			</div>
	   </div>
	</div>
</section>		
<!-- Available Features -->

@endsection