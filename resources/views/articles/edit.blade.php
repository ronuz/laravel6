@extends('layout')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css" />
@endsection
@section('content')
<div class="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">Edit Article </h1>
        <form action="/articles/{{$article->id}}" method="POST">
        @csrf
        @method('PUT')
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" id="title"  name="title" class="text" value="{{$article->title}}">
                </div>
            </div>
            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control">
                <textarea class="textarea" name="excerpt"  id="excerpt">{{$article->excerpt}}</textarea>
                </div>
            </div>
            <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control">
                    <textarea class="textarea" name="body"  id="body">{{$article->body}}</textarea>
                </div>
            </div>
            <div class="field is-grouped">
                <div class="control">
                    <button class="button is_link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection