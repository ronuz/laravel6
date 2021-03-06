@extends('layout')
@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css" />
@endsection
@section('content')
<div class="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>
        <form action="/articles" method="POST">
        @csrf
            <div class="field">
                <label for="title" class="label">Title</label>
                <div class="control">
                    <input type="text" 
                    id="title"
                     name="title"
                      class="text @error('title') is-danger @enderror"
                      value="{{old('title')}}">
                    @error('title')
                    <p class="help is-danger">{{$errors->first('title')}}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>
                <div class="control">
                <textarea 
                class="textarea @error('excerpt') is-danger @enderror"
                 name="excerpt" 
                 id="excerpt"
                 value="{{old('excerpt')}}"></textarea>
                @error('excerpt')
                <p class="help is-danger">{{$errors->first('excerpt')}}</p>
                @enderror    
            </div>
            </div>
            <div class="field">
                <label for="body" class="label">Body</label>
                <div class="control">
                    <textarea
                     class="textarea @error('body') is-danger @enderror" 
                     name="body" 
                     id="body"
                     value="{{old('body')}}"></textarea>
                    @error('body')
                    <p class="help is-danger">{{$errors->first('body')}}</p>
                    @enderror
                </div>
            </div>
            <div class="field">
                <label for="excerpt" class="label">Tag</label>
                <div class="select is-multiple control">
               <select
               name="tags()"
               multiple>
               @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            </select>

                @error('tag')
                <p class="help is-danger">{{$message}}</p>
                @enderror    
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