@extends('layout')
@section('content')
<h1>My new post in this training project!</h1>
<p>
    {{$post->text}}
</p>
@endsection