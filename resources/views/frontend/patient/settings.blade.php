@extends('frontend.layouts.app')
@section('main')


    <!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-md-12 col-12">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
								</ol>
							</nav>
							<h2 class="breadcrumb-title">Profile Settings</h2>
						</div>
					</div>
				</div>
			</div>
			<!-- /Breadcrumb -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
					
						<!-- Profile Sidebar -->
						@include('frontend.patient.sidebar')
						<!-- /Profile Sidebar -->
						
						<div class="col-md-7 col-lg-8 col-xl-9">
							<div class="card">
								<div class="card-body">
									
									<!-- Profile Settings Form -->
									@include('validate')
									<form action="{{ route('patient.profile.update') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="row form-row">
											<div class="col-12 col-md-12">
												<div class="form-group">
													<div class="change-avatar">
														<div class="profile-img">
															@if (!Auth::guard('patient')->user()->photo)

																<img src="{{ url('storage/frontend/' . 'avatar.png') }}" alt="User Image">

																@else

																<img src="{{ url('storage/frontend/' . Auth::guard('patient') -> user() -> photo) }}" alt="User Image">
																	
																@endif
														</div>
														<div class="upload-img">
															<div class="change-photo-btn">
																<span><i class="fa fa-upload"></i> Upload Photo</span>
																<input name="photo" type="file" class="upload">
															</div>
															<small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
														</div>
													</div>
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Name</label>
													<input disabled type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> name }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Blood Group</label>
													<input name="blood_group" type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> blood_group }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Date of Birth</label>
													
														<input name="date_of_birth" type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> date_of_birth }}" placeholder="31-12-1990">
													
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Age</label>
													<input name="age" type="number" class="form-control" value="{{ Auth::guard('patient') -> user() -> age }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Email ID</label>
													<input disabled type="email" class="form-control" value="{{ Auth::guard('patient') -> user() -> email }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Mobile</label>
													<input type="text" disabled value="{{ Auth::guard('patient') -> user() -> phone }}" class="form-control">
												</div>
											</div>
											<div class="col-12">
												<div class="form-group">
												<label>Address</label>
													<input name="address" type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> address }}">
												</div>
											</div>
										
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>City</label>
													<input name="city" type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> city }}">
												</div>
											</div>
											<div class="col-12 col-md-6">
												<div class="form-group">
													<label>Country</label>
													<input name="country" type="text" class="form-control" value="{{ Auth::guard('patient') -> user() -> country }}">
												</div>
											</div>
										</div>
										<div class="submit-section">
											<button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
										</div>
									</form>
									<!-- /Profile Settings Form -->
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>		
			<!-- /Page Content -->


@endsection