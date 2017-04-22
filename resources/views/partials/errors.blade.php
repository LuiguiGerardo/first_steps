@if (count($errors) > 0)
	<div class="alert alert-danger">
		Por favor corrige los siguientes errores:<br>
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif