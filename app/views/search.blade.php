@extends('master');
@section('header')
	{{Form::open()}}
	<p>{{Form::label('Search')}}
	{{Form::text('search_db')}} 

	@if(isset($errors->first('search_db'))
		{{$errors->first('search_db','<span class=error>:message</span>')}}
	@endif

	{{Form::submit("Search")}}
	</p>
	{{Form::close()}}

@stop

@section('content')
	@if (isset($text))
		@foreach($text as $texts)
		

		@endforeach


	@endif
	@if(!empty($entries))
		<h2>Search Results</h2>

		@foreach($entries as $entry)
		<p>
			<a href="./show/{{$entry['id']}}">{{$entry['name']}}</a>
		</p>
		
		@endforeach
	@endif

@stop