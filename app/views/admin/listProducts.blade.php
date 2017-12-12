@extends('layouts.home')

@section('title')
	Product list
@stop

@section('content')
<div class="container">
<h1>Products</h1>

<table class="table">
	<tr>
		<th>#</th>
		<th>Title</th>
		<th>Image</th>
		<th>Category</th>
		<th>Subcategory</th>
		<th>Description</th>
		<th>Price</th>
		<th>Ret</th>
		<th>Slet</th>
		
	</tr>
	@foreach($products as $product)
		<tr>
			<td>{{ $product->id }}</td>
			<td><a  href="/admin/{{ $product->name }}/list">{{ $product->title }}</a></td>
			<td><img src="/images/{{ $product->coverImg }}" style="height:50px; width:50px;"><br>
			<td>{{ $product->category->name }} </td>	
			<td>{{ $product->subcategory->name }} </td>		
			<td>{{ $product->description }} </td>	
			<td>{{ $product->price }}</td>
			
				<td><a href="/admin/editProduct/{{ $product->id  }}" class="btn btn-primary btn-xs">RET</a></td>
			<td><a href="/admin/deleteProduct/{{ $product->id  }}" class="btn btn-danger btn-xs">SLET</a></td>
			
		</tr>
	@endforeach

</table>
<a href="/admin/addProduct" class="btn btn-primary ">Add Ny</a>
</div>
@stop