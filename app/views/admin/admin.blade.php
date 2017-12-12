@extends('layouts.home')

@section('title')
Admin page
@stop

@section('content')
<div class="row" style="padding-left:100px;">
<h1>Admin</h1>

<p>Username : {{  Auth::user()->username }}</p>
<p>Email : {{  Auth::user()->email }}</p>
</div>
<div class="col-sm-2" style="border:1px solid green; margin:10px;padding-bottom:10px;text-align:center;">
	<a href="/admin/listUsers" ><h3>USERS</h3></a>
</div>

<div class="col-sm-2" style="border:1px solid green; margin:10px;padding-bottom:10px;text-align:center;">
	<a href="/admin/listProducts" ><h3>PRODUCTS</h3></a>
</div>
<div class="col-sm-2" style="border:1px solid green; margin:10px;padding-bottom:10px;text-align:center;">
	<a href="/admin/listAuthors" class="admin-items"> <h3>AUTHORS</h3></a>
</div>
<div class="col-sm-2" style="border:1px solid green;  margin:10px;padding-bottom:10px;text-align:center;">
<a href="/admin/listBags" ><h3>BAGS</h3>
</a>
</div>
<div class="col-sm-2 " style="border:1px solid green; margin:10px; padding-bottom:10px;text-align:center;">

<a href="/admin/listGames" ><h3>GAMES</h3></a>
</div>

@stop