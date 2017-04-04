@if (Session::has('status'))
	<div class="alert alert-success" role="alert">
		<strong>Success:</strong>{{ Session::get('status')}}
	</div>
@endif

@if(count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Errors:</strong>
		<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error}}</li>
		@endforeach
		</ul>
	</div>

@endif