@extends('theme.main')

@section('content')
<div class="container content-wrap">
	<div class="row">
		<div class="col-md-9">
			<div class="row clearfix">
				<div class="col-lg-12">
					<form method="post" action="{{ route('my-account.update-personal-info') }}">
						@csrf
						<div class="tabs tabs-alt clearfix" id="tabs-profile">
							<div class="tab-content clearfix" id="tab-feeds">

								<h4>Personal Information</h4>
								@if (Session::has('success'))
								<div class="alert alert-info" role="alert">
									{{ Session::get('success') }}
								</div>
								@endif

								<div class="form-group row">
									<div class="col-md-6">
										<label for="formGroupExampleInput">First Name</label>
										<input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" name="firstname" value="{{ old('firstname', $member->firstname) }}">
										@error('firstname')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="col-md-6">
										<label for="formGroupExampleInput">Last Name</label>
										<input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname', $member->lastname) }}">
										@error('lastname')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<hr>

								<h4>Address Information</h4>

								<div class="form-group row">
									<div class="col-md-6">
										<label for="formGroupExampleInput">Street *</label>
										<input type="text" class="form-control @error('address_street') is-invalid @enderror" id="delivery_street" name="address_street" placeholder="Unit No./Building/House No./Street" value="{{ old('address_street', $member->address_street) }}"/>
										@error('address_street')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="col-md-6">
										<label for="formGroupExampleInput">Municipality *</label>
										<input type="text" class="form-control @error('address_municipality') is-invalid @enderror" id="address_municipality" name="address_municipality" placeholder="Subd/Brgy/Municipality/City/Province" value="{{ old('address_municipality', $member->address_municipality) }}"/>
										@error('address_municipality')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="form-group row mb-4">
									<div class="col-md-6">
										<label for="formGroupExampleInput">City *</label>
										<input type="text" class="form-control @error('address_city') is-invalid @enderror" id="address_city" name="address_city" value="{{ old('address_city', $member->address_city) }}"/>
										@error('address_city')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="col-md-6">
										<label for="formGroupExampleInput">Zip Code *</label>
										<input type="text" class="form-control @error('address_zip') is-invalid @enderror" id="address_zip" name="address_zip" value="{{ old('address_zip', $member->address_zip) }}"/>
										@error('address_zip')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<hr>

								<h4>Contact Information</h4>
								<div class="form-group row">
									<div class="col-md-4">
										<label for="formGroupExampleInput">Telephone Number *</label>
										<input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $member->phone) }}">
										@error('phone')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
									<div class="col-md-4">
										<label for="formGroupExampleInput">Mobile Number *</label>
										<input type="text" class="form-control @error('mobile') is-invalid @enderror" id="mobile" name="mobile" value="{{ old('mobile', $member->mobile) }}">
										@error('mobile')
										<span class="text-danger">{{ $message }}</span>
										@enderror
									</div>
								</div>

								<div class="form-group">
									<button type="submit" class="button button-3d button-black m-0 add_button">Save Changes</button>
									<a href="{{ route('customer.manage-account') }}" class="button button-3d button-green m-0 add_button">Reset</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@include('theme.pages.member.sidebar')
	</div>
</div>
@endsection

