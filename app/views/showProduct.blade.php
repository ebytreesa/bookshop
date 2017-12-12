@extends('layouts.home')

@section('title')
	{{ $product->title }}
@stop

@section('content')
<div class="a" style="padding-left:50px;">
<h1>{{ $product->title }}</h1>

	
		<div class="col-sm-2" style="padding:30px;">	
			<img class="img-responsive" src="/images/{{ $product->coverImg }}"><br>
			<p><b>{{ $product->description}} </b></p>

		</div>

		<div class="col-sm-2" style="padding:30px;">	
			<p>Price<strong> {{ $product->price }}kr.</strong></p>
			{{Form::open(array('route' => 'addToCart')) }}
			{{ Form::hidden('id', $product->id)}}
			{{ Form::hidden('price', $product->price)}}
               
                <select name="amount" style="width: 100%;">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select><br><br>
                {{ Form::submit('Add to Cart', array('class' => 'btn btn-primary')) }}
             
            {{Form::close()}}

		</div>		
	



</div>
@stop