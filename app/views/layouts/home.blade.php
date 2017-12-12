<!doctype html>
<html lang="da">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
 

</head>
<style type="text/css">
	.searchBtn
	{
		background-color:green;
		padding:5px 30px;
		color:white;
		line-height: 20px;
		font-weight: 400;
		box-shadow:2px 2px 2px grey;
		-moz-box-shadow:2px 2px 2px grey;
        -webkit-box-shadow:2px 2px 2px grey;*/
	}
	.navbar-toggle .icon-bar
	{ 
		background-color:red;
	}

	.sidebar
	{
		width:250px;
		height:100%;
		background: black;
		color:white;
		position:fixed;
		
	/*	z-index:1000;*/
	}

	.no-padding
	{
		margin:0;
		padding: 0;
	}

	ul li a
	{
		color:white;
		font-weight:10;
	}
@media screen and (max-width: 768px){

	.row-offcanvas 
	{
    position: relative;
    -webkit-transition: all 0.25s ease-out;
    -moz-transition: all 0.25s ease-out;
    transition: all 0.25s ease-out;
    width:calc(100% + 220px);
  }

  .row-offcanvas-left
  {
    left: -220px;
  }

  .row-offcanvas-left.active {
    left: 0;
  }

  .sidebar-offcanvas {
    position: absolute;
    top: 0;
  }
}

.admin-items
{
	font-size: 20px;
	font-weight: 100;
}
</style>
<script>
$(document).ready(function() {
  $('[data-toggle=offcanvas]').click(function() {
    $('.row-offcanvas').toggleClass('active');
  });
});
</script>
<body>
<div class="container-fluid" >
<header>
	<nav class="navbar" >
		<div class="container" style="width:90%;  margin-top:20px;">
			<div class="navbar-header" style="margin-right:40px;">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="/"><img class = "img-responsive" src="{{url('/logo/logo.jpg')}}" style="height:80px; width:80px;"></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse" style="margin-top:10px; margin-right:20px;">
				<ul class="nav navbar-nav">
			@if (Auth::guest()) 
					<li><a href="/login" class="btn-flat" style="color:blue; font-weight:700; margin-right:20px;">LOGIN</a></li>
					<li><a href="/register" class="btn btn-primary " style="border-radius:0px;">REGISTER</a></li>
				
			@else 
					<h5>Welcome {{ auth::user()->username }}</h5>
			@endif
					
					
					

				</ul>
				<div class="nav navbar-nav navbar-right" style=" width:60%;">
					
					{{ Form::open() }}						
					<div class="input-group">	
  						<input  type="text" placeholder="Search" class="form-control" style="">
  						<span class="input-group-btn">
    					<button class="btn searchBtn" type="submit" style="margin-left:10px;">SEARCH</button>
  						</span>
					</div>						
					{{ Form::close() }}										
				</div>
			</div>			
		</div>		
	</nav>
</header>
</div>

<section class="row-offcanvas row-offcanvas-left" >

<div class="sidebar sidebar-offcanvas" style="padding-left:40px;">
 <h5 style="font-size: 18px;">Categories</h5><br><br>
 <ul class="nav sidebar-nav" style="font-size: 16px;">

 	<?php
		 $categories = Category::get();
		?>
		@foreach($categories as $category)
 	     <li class="dropdown"><a href="/home/{{ $category->name }}" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}<span class="caret"></span></a>
 	     	<ul class="dropdown-menu">
 	    <?php
		 $subcategories = Subcategory::where('category_id', $category->id)->get();
		?>
		@foreach($subcategories as $subcategory)
 	     		<li><a href="/home/{{ $category->name }}/{{ $subcategory->name }}">{{ $subcategory->name }}</a></li>
 	    @endforeach				
 	     	</ul>
 	     </li>	
 	    @endforeach		
 	 	
 	
 	@if (Auth::check())
 	<li class="dropdown"><a href="/profile">my profile</a></li>	
 	<li class="dropdown"><a href="/logout">logout</a></li>
 		@if (Auth::user()->admin == 1)
 			<br><br>
 			<li class="dropdown"><a href="/admin">ADMIN</a></li>
 		@endif
 	@endif
 
 </ul>	
	
	
</div>
<div class="main-content" style="border:1px solid green; margin-left:250px; ">
	@if ( Session::has('success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('success') }}
		</div>
	@endif
	@if ( Session::has('error'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('error') }}
		</div>
	@endif
 <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
	@yield('content')
</div>
</div>

</section>	

	
</body>