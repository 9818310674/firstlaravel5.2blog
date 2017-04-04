@extends('layout')
<?php $title = htmlspecialchars($post->title); ?>
@section('title', "| $title")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $post->title }}</h1>
                <h5>Published: {{ date('M j, Y h:ia',strtotime($post->created_at)) }}</h5>
                <br>
                <p>{{ $post->body }}</p>
                <hr>
                {{--<p>Posted In:{{ $post->category->name }}</p>--}}
            </div>
        </div>
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comment-title">
                <span class="glyphicon glyphicon-comment"></span>
                {{ $post->comments()->count() }} Comments
            </h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{"https://www.gravatar.com/avatar/".md5(strtolower(trim($comment->email))). "?s=50&d=mm" }}" class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{ date('F nS, Y - G:iA',strtotime($comment->created_at)) }}</p>
                        </div>
                    </div>
                    <div class="comment-content">
                        {{ $comment->comment }}
                    </div>
                </div>
                @endforeach
        </div>
        </div>
        <div class="row">
            <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">
                <h3>Add Your Comment Here</h3>
                <hr>
            {!! Form::open(['route' => ['comments.store',$post->id],'method'=>'post']) !!}
                <div class="row">
                    <div class="col-md-6">
                        {{Form::label('name','Name:', array('class'=>'form-spacing-top'))}}
                        {{Form::text('name',null, array('class'=>'form-control'))}}
                    </div>
                    <div class="col-md-6">
                        {{Form::label('email','Email:', array('class'=>'form-spacing-top'))}}
                        {{Form::text('email',null, array('class'=>'form-control'))}}
                    </div>
                    <div class="col-md-12">
                        {{Form::label('comment','Comment:', array('class'=>'form-spacing-top'))}}
                        {{Form::textarea('comment',null, array('class'=>'form-control','rows'=>'5', 'style'=>'margin-bottom: 15px;'))}}
                        {{Form::submit('Comment', array('class'=>'btn btn-success btn-block '))}}
                    </div>
                </div>
            {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection