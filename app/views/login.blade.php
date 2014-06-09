<?php
@extends('master');


@section('header')


@stop

@section('content')
	<h2>Member Login</h2>
	{{Form::open()}}
	<p>
		{{Form::label('User name')}}
		{{Form::text('userName')}}

		@if(isset($errors->first('userName'))
			{{$errors->first('userName','<span class="error">:message</span>')}}
		@endif
 	</p>
 	<p>
 		{{Form::label('Password')}}
		{{Form::text('password')}}
		@if(isset($errors->first('password'))
			{{$errors->first('password','<span class="error">:message</span>')}}
		@endif

 	</p>
		{{Form::submit("Login")}}
	</p>
	{{Form::close()}}


@stop