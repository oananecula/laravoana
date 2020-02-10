<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        if (request('tag')) 
        {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } 
        else{
            $articles = Article::latest()->get();
        }
        
        return view('articles.index', ['articles'=>$articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', ['article'=>$article]);
    }

    public function create()
    {   
        return view('articles.create', [
            'tags' => Tag::all()
        ]);    
    }

    public function store()
    {    
        $article = new Article($this->validateArticle());
        $article->user_id=2;

        return redirect(route("Articles.index"));
    } 

    public function edit(Article $article)
    {
        return view('articles.edit', [ 'article' => $article]);
    }

    public function update(Article $article)
    {    
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function destroy()
    {
        
    }

    protected function validateArticle()
    {
        return request()->validate([            
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => ['required', 'min:3'],
            'body' => ['required', 'min:3']
            ]);
    }
}
