@extends('layout')
@section('header-main')
@forelse($articles as $article)
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2><a href="/articles/{{$article->id}}">{{$article->title}}</a></h2>
				<span class="byline">{{$article->excerpt}}</span> </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{{$article->body}}
		</div>
		@empty
		<p>No relevant articles yet</p>
	</div>
</div>
@endforelse
@endsection