@extends('layouts.adminpage')

@section('bodycontent')
<div class="container">
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
	<div class="pagination"> {{ $quotes->links() }} </div>
</div>	

@endsection