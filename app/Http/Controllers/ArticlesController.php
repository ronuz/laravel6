<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function show(Article $article)
    {
        //Show only one resource
        Article::where('id', 1)->latest();
        return view('articles.show', compact('article'));
    }

    public function index()
    {
        //Shows a list of all the resources
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }
        $articles = Article::all();
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags'=>Tag::all()
        ]);
        //Show a view to create a new resource
    }
    public function store()
    {
        //Persist the new resources
        $this->validatedArticle();
        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(request('tags'));
        
        //Article::create($this->validatedArticle());
        return redirect('/articles');
    }
    public function edit(Article $article)
    {
        return view('articles.edit', ['article' => $article]);
        //Show a view to edit a resource
    }
    public function update(Article $article)
    {
        //Update the resource
        $article->update($this->validatedArticle());
        return redirect('/articles/' . $article->id);
    }
    public function destroy()
    {
        //Delete the resource
    }

    protected function validatedArticle()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags'=> 'exists:tags,id'
        ]);
    }
}
