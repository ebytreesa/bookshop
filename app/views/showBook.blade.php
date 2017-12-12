@extends('layouts.home')

@section('title')
	{{ $book->title }}
@stop

@section('content')
<div class="a" style="padding-left:50px;">
<h1>{{ $book->title }}</h1>

	
		<div class="col-sm-2" style="padding:30px;">	
			<img class="img-responsive" src="/books/{{ $book->coverImg }}"><br>
			<p><b>{{ $book->author->firstname}} {{ $book->author->lastname}}</b></p>

		</div>

		<div class="col-sm-2" style="padding:30px;">	
			<p>Price<strong> {{ $book->price }}kr.</strong></p>
			{{Form::open(array('route' => 'addToCart')) }}
			{{ Form::hidden('id', $book->id)}}
			{{ Form::hidden('price', $book->price)}}
               
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