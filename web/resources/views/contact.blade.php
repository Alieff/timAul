@extends('layouts.page')
@section('contactact')
'active'
@endsection
@section('bodycontent')
<img style="width:100%" src="../resources/assets/images/landing.jpg" class="img-responsive" alt="Responsive image">
@section('contact_storetact')
'active'
@endsection
@section('bodycontent')
<img src="../resources/assets/images/landing.jpg" class="img-responsive header-img" alt="Responsive image">
<br>
<div class="container">
  <div class="row">
    <div class="col-md-6 .col-xs-6">
      <h2>Ask Us Anything</h2>
		
		{!! Form:: open(array('url' => 'contact_request')) !!}

		  <label for="name" class="sr-only">Name</label>
		  <input type="text" id="name" class="form-control" placeholder="Name" required autofocus>

		  <label for="email" class="sr-only">Email address</label>
		  <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus>

		  <label for="message" class="sr-only">Message</label>
		  <textarea id="message" class="form-control" placeholder="Message" required></textarea>

		  <button class="btn btn-primary" type="submit">Submit</button>

		{!! Form::close() !!} 
		
      @if(Session::has('message'))
        <div class="alert alert-info">
          {{Session::get('message')}}
        </div>
      @endif

      <ul>
          @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>


      {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}

      <div class="form-group">
          {!! Form::label('Your Name') !!}
          {!! Form::text('name', null, 
              array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Your name')) !!}
      </div>

      <div class="form-group">
          {!! Form::label('Your E-mail Address') !!}
          {!! Form::text('email', null, 
              array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Your e-mail address')) !!}
      </div>


      <div class="form-group">
          {!! Form::label('Your Message') !!}
          {!! Form::textarea('message', null, 
              array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Your message')) !!}
      </div>

      <div class="form-group">
          {!! Form::submit('Submit', 
            array('class'=>'btn btn-primary')) !!}
      </div>

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
