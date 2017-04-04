@extends('layout')

@section('title','| Home Page')

@section('content')  
        <div class="jumbotron">
            <div class="container">
              <h1>Hello, Everyone!</h1>
              <p class="lead">I am learning Laravel (PHP Framework) right now and this is going to be my first laravel project. This is February 14 of 2017. I am doing this project in Laravel version 5.2 . This is going to be very simple blog, where I will be including simple post,comment,login,contact and register system.</p>
              <p class="lead">I will be using bootstrap for my design part as I am focusing more on Laravel part only.So, the UI as you an see will be very simple this time.But I will try to include every possible feature you get to see in a normal website.
              <p class="lead">If you want to get the source code of this project, you can click the button down below.Or, if you want to see my other projects ,you can visit www.salingiri.com.np .</p>

              <p> Thank you for visiting. </p>

              <br>

              <p><a class="btn btn-primary btn-lg" href="#" role="button">Get Sorce Code</a></p>
            </div>
        </div> 
    <div class="container">
      <div class="col-md-12">
      <!-- Example row of columns -->
            <div class="col-md-8">

              @foreach($posts as $post)

                <div class="post">
                      <h2>{{ $post->title }}</h2>
                      <p>{{ substr($post->body, 0, 300) }}{{ strlen($post->body) > 300 ? "..." : ""}}</p>
                      <p><a class="btn btn-primary" href="{{ url('blog/'.$post->slug) }}">Read More »</a></p>
                </div>

              @endforeach
              <hr>
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h1>Sidebar</h1>
                    <div class="sidebar-module sidebar-module-inset">
                        <h4>About</h4>
                        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
                    </div>
                    <div class="sidebar-module">
                        <h4>Archives</h4>
                        <ol class="list-unstyled">
                          <li><a href="#">March 2014</a></li>
                          <li><a href="#">February 2014</a></li>
                          <li><a href="#">January 2014</a></li>
                          <li><a href="#">December 2013</a></li>
                          <li><a href="#">November 2013</a></li>
                          <li><a href="#">October 2013</a></li>
                          <li><a href="#">September 2013</a></li>
                          <li><a href="#">August 2013</a></li>
                          <li><a href="#">July 2013</a></li>
                          <li><a href="#">June 2013</a></li>
                          <li><a href="#">May 2013</a></li>
                          <li><a href="#">April 2013</a></li>
                        </ol>
                    </div>
                    <div class="sidebar-module">
                        <h4>Elsewhere</h4>
                        <ol class="list-unstyled">
                          <li><a href="#">GitHub</a></li>
                          <li><a href="#">Twitter</a></li>
                          <li><a href="#">Facebook</a></li>
                        </ol>
                    </div>
            </div>
        
      </div>
    </div>
@endsection