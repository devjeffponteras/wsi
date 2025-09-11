@extends('theme.main')

@section('content')
<div class="container topmargin-lg bottommargin-lg">
	<div class="row">
		<div class="container mt-5">
			<div class="card text-center">
				<div class="card-body">
					<h3 class="card-title text-success">Deactivation Successful</h3>
					<p class="card-text">Your social login account has been successfully deactivated.</p>
					<a href="{{ env('APP_URL') }}" class="btn btn-primary">Go Back</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('pagejs')

@endsection

