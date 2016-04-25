@extends('layouts.page')
@section('bodycontent')
<img style="width:100%;padding-top:50px;" src="..\resources\assets\images\landing.jpg" class="img-responsive" alt="Responsive image">
<br />
<div class="container">
  <div class="row">
    <div class="col-md-6 .col-xs-6">
      <h2>Ask Us Anything</h2>

      {!! Form::open(array('url' => 'contact_request')) !!}

      <label for="inputEmail" class="sr-only">Name</label>
      <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputMessage" class="sr-only">Message</label>
      <textarea id="inputMessage" class="form-control" placeholder="Message" required></textarea>

      <button class="btn btn-primary" type="submit">Submit</button>

      {!! Form::close() !!}
    </div>

    <div class="col-md-6 .col-xs-6">
      <h2>Information</h2>
      <div class="wrapper">
        <span class="fa-stack fa-lg">
          <i class="fa fa-envelope fa-stack-1x"></i>
        </span>
        cs@owlteam.com<br>

        <span class="fa-stack fa-lg">
          <i class="fa fa-phone fa-stack-1x"></i>
        </span>
        021 77840082<br>

        <span class="fa-stack fa-lg">
          <i class="fa fa-map-marker fa-stack-1x"></i>
        </span>
        BADR Interactive, Jln. IR. H. Juanda,
        Bakti Jaya, Kota Depok, Jawa Barat<br />

      </div>
    </div>
  </div>
</div>
<br />
<br />


@endsection
