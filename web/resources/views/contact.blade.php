@extends('layouts.page')
@section('bodycontent')
<img style="width:100%;padding-top:50px;" src="..\resources\assets\images\landing.jpg" class="img-responsive" alt="Responsive image">
<br />
<div class="container">
  <div class="row">
    <div class="col-md-6 .col-xs-6">
      <h2>Ask Us Anything</h2>

      {!! Form::open(array('url' => 'contact_request')) !!}

      <div class="form-group">
          {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
          {!! Form::text('name', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
          {!! Form::text('email', null, ['class' => 'form-control']) !!}
      </div>

      <div class="form-group">
          {!! Form::label('message', 'Message:', ['class' => 'control-label']) !!}
          {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
      </div>

      {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

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
