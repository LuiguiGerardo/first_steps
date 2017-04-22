@extends('layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Posts</div>
				<div class="panel-body">
					@include('partials.errors')								
					<form method="GET" action="">
						{{ csrf_field() }}
						<table class="table table-striped">
							<thead>
								<th>title</th>
								<th>post</th>
								<th>user</th>
								<th>options</th>
							</thead>
							<tbody>
								<tr>
									<td>asdasd</td>
									<td>asdadsd</td>
									<td>qweqweqwe</td>
									<td>treter</td>
								</tr>
								
							</tbody>
						</table>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection