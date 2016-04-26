@extends('layouts.page')
@section('bodycontent')
<img style="width:100%;padding-top:50px;" src="..\resources\assets\images\landing.jpg" class="img-responsive" alt="Responsive image">
<br />
<div class="container">
  <div class="row">
    <div class="col-md-6 .col-xs-6">
      <h2>Ask Us Anything</h2>

      <form class="form">
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" id="inputName" class="form-control" placeholder="Name" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputMessage" class="sr-only">Message</label>
        <textarea id="inputMessage" class="form-control" placeholder="Message" required></textarea>

        <button class="btn btn-primary" type="submit">Submit</button>
        </form>
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

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.106884822344!2d106.85115395009984!3d-6.380202564160716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69eb87fdf52211%3A0x4d30fcd079462535!2sBadr+Interactive%2C+Inc.!5e0!3m2!1sen!2sid!4v1461551343654" width="60%" height="45%" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<br />
<br />


@endsection
