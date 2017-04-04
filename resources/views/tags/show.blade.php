@extends('layout')

@section('title',"| $tag->name Tag")

@section('content')

        <div class="row">
            <div class="col-md-9">
                <div class="col-md-8">
                <h1>{{ $tag->name }} Tag <small>{{ $tag->posts()->count() }} Posts</small></h1>
                </div>
                <div class="col-md-2 " style="margin-top: 10px;">
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary pull-right btn-block" style="margin-top: 20px;">Edit</a>
                </div>
                <div class="col-md-2 " style="margin-top: 10px;">
                    {!! Form::open(['route' => ['tags.destroy', $tag->id],'method'=>'POST']) !!}
                    {{Form::submit('Delete',['class' => 'btn btn-danger btn-block btn-h1-spacing'])}}
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="col-md-9">
                    <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Tags</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td>@foreach($post->tags as $tag)
                                    <span class="label label-default">{{ $tag->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('posts.show',$post->id) }}" class="button button-default btn-xs"></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <div class="well">
                    {!! Form::open(['route' => 'tags.store','method'=>'POST']) !!}
                    <h2>New Tag</h2>
                    {{ Form::label('name','Name:') }}
                    {{Form::text('name',null,['class'=>'form-control'])}}
                    {{Form::submit('Create New Tag',['class' => 'btn btn-primary btn-block btn-h1-spacing'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>

@endsection