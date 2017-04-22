@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Change Password</div>
				<div class="panel-body">
					@include('partials.errors')
										
					<form action="{{ url('account/password') }}" method="POST">
						{{ csrf_field() }}
						<input type="password" name="current_password" class="form-control">
						<input type="password" name="password" class="form-control">
						<input type="password" name="password_confirmation" class="form-control">

						<button type="submit" class="btn btn-primary">Change password</button>
					</form>					
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection