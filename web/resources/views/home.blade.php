@extends('layouts.page')
@section('homeact')
'active'
@endsection
@section('bodycontent')
<img style="width:100%" src="../resources/assets/images/landing.jpg" class="img-responsive" alt="Responsive image">
<div class="jumbotron headline">
<div class="col-lg-8 col-lg-offset-2" class="jumbotron">
      <h2 id="namaku">INSPIRE CRAWLER</h2>
      <p>
      <?php echo public_path();  ?>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed sem augue. Sed eleifend diam eget lorem dictum varius. Morbi id nisi eu erat congue tempor. Nulla urna ipsum, lacinia in vestibulum at, laoreet eget mauris. Nam viverra convallis odio, nec egestas nisi vestibulum eu.
      </p>
      <div class="row" style="padding-top: 25px">
      <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-3 col-xs-3 col-xs-offset-1"><a href="apioverview" class="btn btn-success">Use Our API</a></div>
      <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-2 col-xs-3 col-xs-offset-2"><a href="http://google.com" class="btn btn-success">Find Out More</a></div>
      </div>
</div>
</div>
<br>
<br>
<br>
<br>
<div class="container feature">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2 list-features">
            <h2>Get Quotes by Website</h2>
            <p>Morbi id nisi eu erat congue tempor. Nulla urna ipsum, lacinia in vestibulum at, laoreet eget mauris.Nam viverra convallis odio, nec egestas nisi vestibulum eu. In blandit, urna nec finibus ullamcorper</p>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4">
            <h2>Get Quotes by Author</h2>
            <p>Aliquam erat volutpat. Sed leo purus, pulvinar quis fermentum vel, pharetra efficitur lectus. Mauris a cursus urna. Aenean id velit eget quam mollis pellentesque. Sed massa nisi, venenatis sit amet dapibus quis, elementum in purus.</p>
        </div>
    </div>
</div>
@endsection