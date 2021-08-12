<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Article::all();
    }

    /**
     * Show the form for creating a new resource.
     *
  

   
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        return Article::create([
            'title' => request('title'),
            'body' => request('body'),
        ]);
    }

    
   

   
 
    public function update(Article $article)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $success = $article->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Article $article)
    {
        $success = $article->delete();

        return [
            'success' => $success
        ];
    }
}
