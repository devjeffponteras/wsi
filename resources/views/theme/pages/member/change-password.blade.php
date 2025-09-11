@extends('theme.main')

@section('content')
    <div class="container content-wrap">
        <div class="row">
            <div class="col-md-9">
				<div class="row clearfix">
					<div class="col-lg-12">
						<h4>Change Password</h4>
						@if (Session::has('success'))	
							<div class="alert alert-info" role="alert">
						  		{{ Session::get('success') }}
							</div>
						@endif

						<form class="form message-form" role="form" autocomplete="off" action="{{ route('my-account.update-password') }}" method="post">
                            @csrf
                            <div class="form-group row">
								<div class="col-md-5">
									<label>Current Password</label>
									<div class="input-group show_hide_password" id="show_hide_password">
									  <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror">
									  <div class="input-group-append">
										<span class="input-group-text"><a href=""><i class="icon icon-eye-slash" aria-hidden="true"></i></a></span>
									  </div>
									</div>
									@error('current_password')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-5">
									<label>New Password</label>
									<div class="input-group show_hide_password" id="show_hide_password">
									  <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
									  <div class="input-group-append">
										<span class="input-group-text"><a href=""><i class="icon icon-eye-slash" aria-hidden="true"></i></a></span>
									  </div>
									</div>
									@error('password')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
	                                <p class="form-text small text-muted"> Minimum of eight (8) alphanumeric characters (combination of letters and numbers) with at least one (1) upper case and one (1) special character.</p>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-md-5">
									<label>Re-type New Password</label>
									<div class="input-group show_hide_password" id="show_hide_password">
									  <input type="password" name="confirm_password" id="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror">
									  <div class="input-group-append">
										<span class="input-group-text"><a href=""><i class="icon icon-eye-slash" aria-hidden="true"></i></a></span>
									  </div>
									</div>
									@error('confirm_password')
	                                    <span class="text-danger">{{ $message }}</span>
	                                @enderror
								</div>
							</div>

							<div class="form-group">
								<button class="button button-3d button-black m-0" type="submit">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			@include('theme.pages.member.sidebar')
        </div>
    </div>
@endsection

@section('pagejs')
	<script>
		$(".show_hide_password").on('click', function(event) {
	        event.preventDefault();
	        if($(this).parent().parent().siblings('input').attr("type") == "text"){
	            $(this).parent().parent().siblings('input').attr('type', 'password');
	            $(this).children('i').addClass( "icon-eye-slash" );
	            $(this).children('i').removeClass( "icon-eye" );
	        }else if($(this).parent().parent().siblings('input').attr("type") == "password"){
	            $(this).parent().parent().siblings('input').attr('type', 'text');
	            $(this).children('i').removeClass( "icon-eye-slash" );
	            $(this).children('i').addClass( "icon-eye" );
	        }
	    });
	</script>
@endsection

