@extends('layouts.home')

@section('title')
profile
@stop

@section('content')
<div class="container" style="width:70%;">
<h1>My profile</h1>

<p>Username : {{  Auth::user()->username }}</p>
<p>Email : {{  Auth::user()->email }}</p>
<a href="/editProfile" class="btn btn-primary">Edit</a>
<a href="/deleteProfile" class="btn btn-danger">Delete</a>
<h3>Your Cart</h3>

 <table class="table">
    <tbody>
      <tr>
        <td><b>Title</b></td>
        <td><b>Category</b></td>
        <td><b>Image</b></td>
        <td><b>Amount</b></td>
        <td><b>Price</b></td>
        <td><b>Total</b></td>
        {{--  <td><b>Edit</b></td> --}}
        <td><b>Delete</b></td>
      </tr>

      @foreach($cart as $cart_item)
        <tr>
        <td>{{$cart_item->product->title}}</td>
         <td>{{$cart_item->product->category->name}}</td>
        <td><img src="/images/{{ $cart_item->product->coverImg }}" style="height:50px; width:50px;"><br>
        <td>{{$cart_item->amount}}</td>
        <td>{{$cart_item->product->price}}</td>
        <td>{{$cart_item->total}}</td>
          {{-- <td><a href="/profile/editCart/{{$cart_item->id }}">Edit</a></td> --}}
        <td><a href="/profile/deleteCart/{{$cart_item->id }}">Delete</a></td>
        </tr>
      @endforeach
      <tr>
        <td></td>
        <td></td>
        <td><b>Total</b></td>
        <?php
        	$total = Cart::where('user_id', Auth::user()->id)->get()->sum('total');
        	?>
        <td><b>{{$total}}</b></td>
        <td></td>        
      </tr>
    </tbody>
  </table>
</div>
@stop