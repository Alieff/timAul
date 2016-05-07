@extends('layouts.page')
@section('bodycontent')
<img style="width:100%;padding-top:50px;" src="..\resources\assets\images\landing.jpg" class="img-responsive" alt="Responsive image">
<br />
<div class="container">
  <div class="row">
    <div class="col-md-6 .col-xs-6">
      <h2>Ask Us Anything</h2>

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
          {!! Form::text('name', null, 
              array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Your name')) !!}
      </div>

      <div class="form-group">
          {!! Form::text('email', null, 
              array('required', 
                    'class'=>'form-control', 
                    'placeholder'=>'Your e-mail address')) !!}
      </div>

      <div class="form-group">
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
