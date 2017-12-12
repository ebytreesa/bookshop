@extends('layouts.home')

@section('title')
	{{ $category->name }} 
@stop

@section('content')
<div class="a" style="padding-left:50px;">
<h1>{{ $category->name }} </h1>

	@foreach($product as $product)
		<div class="col-sm-2" style="padding:30px;">	
			<a href="/home/product/{{ $product->id }}"><img class="img-responsive" src="/images/{{ $product->coverImg }}"></a>
			<p style="padding-left:10px;">{{ $product->title}}  </p>

		</div>	
	@endforeach



</div>
@stop