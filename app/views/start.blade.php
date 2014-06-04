@extends('master')

@section('header')
<section id="home">
<!--djpedia logo-->
<div class="navbar">
<ul>
	<li><a href="#home">Home</a></li>
	<li><a href="#about">About</a></li>
	<li><a href="#contributor">Be A Contributor</a></li>
		
	
</ul>
</div>
<!--djpedia slideshow-->
<!--search-->
<p>
{{Form::open()}}
{{Form::label('Search')}}
{{Form::text('search_db')}} {{Form::submit("Search")}}
{{Form::close()}}
</p>
</section>
@stop

@content('content')


@stop