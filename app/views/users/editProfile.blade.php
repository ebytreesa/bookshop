@extends('layouts.home')

@section('title')
edit profile
@stop

@section('content')
<div class="container" style="width:70%;">
<h1>Edit profile</h1>

{{ Form::open(array('route' => 'postEditProfile', 'files' => 'true')) }}
<div class="form-group {{ ($errors->has('username')) ? ' has-error' : ''}}">
	{{ Form::label('username') }}
	{{ Form::text('username', Auth::user()->username, array('class' => 'form-control', 'required' =>'required')) }}	
	@if ($errors->has('username'))
		<strong>
			{{ $errors->first('username') }}
		</strong>
		@endif
</div>

<div class="form-group {{ ($errors->has('email')) ? ' has-error' : ''}}">
	{{ Form::label('Email', 'E-mail Address')}}
	{{ Form::text('email', Auth::user()->email, array('class' => 'form-control', 'required' => 'required'))}}
	@if ($errors->has('email'))
		<strong>
			{{ $errors->first('email') }}
		</strong>
		@endif
</div>


{{ Form::submit('Submit', array('class'  => 'btn btn-primary')) }}




{{ Form:: close()}}
</div>
@stop