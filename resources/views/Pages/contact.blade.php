@extends('layout')

@section('title','| Conatct Page')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-sm">
                    <form action="{{url('contact')}}" method="POST">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Name</label>
                                <input class="form-control" id="name" placeholder="Enter name" required="required" type="text">
                            </div>
                            <div class="form-group">
                                <label for="email">
                                    Email Address</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                    </span>
                                    <input class="form-control" id="email" name="email" placeholder="Enter email" required="required" type="email"></div>
                            </div>
                            <div class="form-group">
                                <label for="subject">
                                    Subject</label>
                                <select id="subject" name="subject" class="form-control" required="required">
                                    <option value="na" selected="">Choose One:</option>
                                    <option value="service">General Customer Service</option>
                                    <option value="suggestions">Suggestions</option>
                                    <option value="product">Product Support</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">
                                    Message</label>
                                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                                Send Message</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <form>
                <legend><span class="glyphicon glyphicon-globe"></span>&nbsp;Our office</legend>
                <address>
                    <strong>Twitter, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    <abbr title="Phone">
                        P:</abbr>
                    (123) 456-7890
                </address>
                <address>
                    <strong>Full Name</strong><br>
                    <a href="mailto:#">first.last@example.com</a>
                </address>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
    <div class="map-responsive">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5942.52469511504!2d85.40313811769904!3d27.67259705069084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1487094907663" width="1140" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    <div class="map-responsive">
    </div>

@endsection