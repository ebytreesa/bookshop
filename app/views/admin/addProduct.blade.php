@extends('layouts.home')

@section('title')
add product

@stop

@section('content')
<div class="container" style="width:70%;">
<h1>Ny Product</h1>


{{ Form::open(array('route' => 'postAddProduct', 'files' => true)) }}
		<div class="form-group {{ ($errors->has('category')) ? 'has-error' : '' }}">
		{{ Form::label('Category') }}
		

		<select name="category" id="cat">
			@foreach($categories as $category)
			
			<option value={{ $category->id }} data="{{ $category->id }}">{{ $category->name }} </option> 

		    @endforeach
		</select>

		</div>
		<br>

		<div class="form-group {{ ($errors->has('subcategory')) ? 'has-error' : '' }}">
		{{ Form::label('Subcategory') }}		

		<select name="subcategory" id="subcat">
		<?php
		 $subcategories = Subcategory::get();
		?>
			@foreach($subcategories as $subcategory)
				<option value={{ $subcategory->id }} data="{{ $subcategory->category_id }}">{{ $subcategory->name }} </option> 
		    @endforeach 
		</select>


	
		</div>
		<br>

		<div class="form-group {{ ($errors->has('title')) ? 'has-error' : '' }}">
		{{ Form::label('Title') }}
		{{ Form::text('title', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('title'))
			<strong>
				{{ $errors->first('title') }}
			</strong>
		@endif
		</div>
		<br>


		<div class="form-group {{ ($errors->has('description')) ? 'has-error' : '' }}">
		{{ Form::label('Description') }}
		{{ Form::text('description', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('description'))
			<strong>
				{{ $errors->first('description') }}
			</strong>
		@endif
		</div>
		<br>

		<div class="form-group {{ ($errors->has('price')) ? 'has-error' : '' }}">
		{{ Form::label('Price') }}
		{{ Form::text('price', '', array('class' => 'form-control', 'required' => 'required')) }}
		@if ($errors->has('price'))
			<strong>
				{{ $errors->first('price') }}
			</strong>
		@endif
		</div>
		<br>

		{{ Form::label('Picture')}}
		{{ Form::file('pic')}}
	<br>

		{{ Form::submit('Add', array('class' => 'btn btn-primary')) }}
{{ Form::close()}}

</div>

<script>
$(function(){
		$("#subcat option").each(function(){
			$(this).hide();
		});
		var id = 1;
		$("#subcat option").each(function(){
			if (id == $(this).attr("data"))
			{
				$(this).show();
			}
		});


$( "#cat" ).change(function () {
		var first = 0;
		$("#subcat option").each(function(){
			$(this).hide();
			$(this).removeAttr("selected");  
		});
		var id = $(this).val();
		$("#subcat option").each(function(){
			if (id == $(this).attr("data"))
			{
				$(this).show();
				first++;
				if (first == 1)
				{
					$(this).attr("selected", "selected");
				}
			}
		});


		// $("#subcat option:selected").change(function(){
		// 	$(this).hide();
		// });

	});
});
</script>

@stop