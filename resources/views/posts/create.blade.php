@extends('layout')

@section('title','| Create New Post')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<h1>Create New Post</h1>

		{!! Form::open(['route' => 'posts.store']) !!}
			{{Form::label('title','Title:', array('class'=>'form-spacing-top'))}}
			{{Form::text('title',null, array('class'=>'form-control'))}}

			{{Form::label('slug','Slug:', array('class'=>'form-spacing-top'))}}
			{{Form::text('slug',null, array('class'=>'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'))}}

			{{Form::label('category','Category:', array('class'=>'form-spacing-top'))}}
			<select class="form-control" name="category">
				@foreach($categories as $category)
				<option value="{{$category->id}}">{{ $category->name }}</option>
				@endforeach
			</select>

			{{Form::label('tags','Tags:', array('class'=>'form-spacing-top'))}}
			<br>
			<select class="form-control js-example-basic-multiple" multiple="multiple" name="tags[]">
				@foreach($tags as $tag)
					<option value="{{$tag->id}}">{{ $tag->name }}</option>
				@endforeach
			</select>
			{{--@foreach($tags as $tag)--}}
				{{--<input class="form-spacing-top" type="checkbox" name="tag[]" value="{{$tag->id  }}"> {{$tag->name }}<br>--}}
			{{--@endforeach--}}

			{{Form::label('body','Post Body:', array('class'=>'form-spacing-top'))}}
			{{Form::textarea('body',null, array('class'=>'form-control'))}}

			{{Form::submit('Create New Post:', array('class'=>'btn btn-success btn-lg btn-block btn-h1-spacing', 'style'=>'margin-top:20px;'))}}
    
		{!! Form::close() !!}
			
		</div>
	</div>

@endsection
