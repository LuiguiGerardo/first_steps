@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Posts</div>
				<div class="panel-body">
					@include('partials.errors')									
					<form method="POST" action="">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" name="title" class="form-control">
						</div>
						<div class="form-group">
							<label for="post">Post</label>
							<textarea class="form-control" name="post"></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Send</button>
							<button type="reset" class="btn btn-default">Clean</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection