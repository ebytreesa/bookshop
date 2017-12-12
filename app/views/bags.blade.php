@extends('layouts.home')

@section('title')
	Bags 
@stop

@section('content')
<div class="a" style="padding-left:50px;">
<h1>Bags</h1>

	@foreach($bags as $bag)
		<div class="col-sm-2" style="padding:30px;">	
			<a href="/home/product/{{ $bag->id }}"><img class="img-responsive" src="/bags/{{ $bag->coverImg }}"></a>
			<p style="padding-left:10px;">{{ $bag->title}}</p>

		</div>	
	@endforeach



</div>
@stop