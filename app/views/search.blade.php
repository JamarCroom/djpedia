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
	@if (!empty($texts)&& !empty($stringText))
		@foreach($texts as $text)
			<h2>{{$text['entry_name']}}</h2>
			{{$stringText}}

		@endforeach
	@endif

	@else
		<h2>{{$text['entry_name']}}</h2>
		<p>There are no results to display.</p>
	@endelse

	@if(!empty($audio))
		<audio controls>
			@foreach($audio as $audios)
				<source src ="{{$audios['path']}}">
			@endforeach
		</audio>
	@endif

	@if(!empty($video))
		<video controls>
			@foreach($video as $videos)
				<source src ="{{$videos['path']}}">
			@endforeach
		</video>
	@endif

	@if(!empty($images))
				
			@foreach($image as $images)
				<img src ="{{$images['path']}}" />
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