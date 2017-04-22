@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Settings</div>
				<div class="panel-body">
					@include('partials.errors')								
					<form method="GET" action="">
						{{ csrf_field() }}
						<p>Change your profile here!</p>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection