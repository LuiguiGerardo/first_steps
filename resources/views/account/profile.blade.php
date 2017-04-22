@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Edit Profile</div>
				<div class="panel-body">
					@include('partials.errors')
									
					<form action="{{ url('account/edit-profile') }}" method="POST">
						{{ csrf_field() }}	

							<div class="form-group">							
								<label for="name">Nombre</label>
								<input type="text" name="name" value="{{ $user->name }}" class="form-control">
								<input type="hidden" name="user_id" value="{{ $user->id }}">
							</div>
							<div class="form-group">
								<label for="username">Nombre de usuario</label>
								<input type="text" name="username" value="{{ $user->username }}" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Update profile</button>
							</div>
					</form>					
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection