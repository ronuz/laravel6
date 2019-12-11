<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostingController extends Controller
{
    public function show($slug){
        //$post = \DB::table('posts')->where('slug', $slug)->first();
        
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}
