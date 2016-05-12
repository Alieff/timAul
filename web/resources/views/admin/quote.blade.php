@extends('layouts.adminpage')

@section('bodycontent')
<div class="container">
<div class ="well well-lg">
	<h1>Yg mo lo cari apa?</h1>
	{!! Form::open(array('route' => 'admin.getquotes', 'class' => 'form-horizontal', 'method' => 'get')) !!}

      <div class="form-group">
          {!! Form::label('Quote',null,array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
	          {!! Form::text('quote', null, 
	              array('class'=>'form-control', 
	                    'placeholder'=>'Substring of quote you want to find')) !!}
	       </div>
      </div>

      <div class="form-group">
          {!! Form::label('Author',null,array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
          {!! Form::text('author', null, 
              array('class'=>'form-control', 
                    'placeholder'=>'Substring of author you want to find')) !!}
          </div>

      </div>


      <div class="form-group">
          {!! Form::label('source',null,array('class' => 'col-sm-2 control-label')) !!}
                   <div class="col-sm-10">

          {!! Form::text('source', null, 
              array('class'=>'form-control', 
                    'placeholder'=>'Substring of source you want to find')) !!}
         </div>

      </div>

      <div class="form-group">
          {!! Form::label('Sort By',null,array('class' => 'col-sm-2 control-label')) !!}
                   <div class="col-sm-10">

          {!! Form::select('sort', array('_id' => 'Id', 'quote' => 'Quote','author' => 'Author', 'source' => 'Source'), 'id') !!}
        </div>

  		<div class="form-group">
          {!! Form::label('with',null,array('class' => 'col-sm-2 control-label')) !!}
                   <div class="col-sm-10">

          <p>{!! Form::radio('sortby','asc',true) !!} Ascending</p>
           <p>{!! Form::radio('sortby','desc') !!} Descending</p>
        </div>
      </div>

      <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          {!! Form::submit('Find', 
            array('class'=>'btn btn-primary')) !!}
            </div>
            </div>
      </div>

      {!! Form::close() !!}
      </div>
      </div>	
      <?php if(isset($quotes)) echo 'diset'; ?>
    @if (isset($quotes))
		<h1>List Quote</h1>
		<p>Find masih smua (asumsiin)</p>
		<table cellspacing="0" class="table">
			<tr>
				<th>Quote</th>
				<th>Author</th>
			</tr>
			@foreach($quotes as $quote)
			<tr>
				<td> {{ $quote->quote }}</td>
				<td> {{ $quote->author}}</td>
			</tr>
			@endforeach
		</table>
		<?php var_dump($quotes); ?>	
		{!! $quotes->render() !!}
	@endif
</div>
@endsection