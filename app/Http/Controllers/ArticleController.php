<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        // $data = [
        //     [ "title" => "Article One"],
        //     [ "title" => "Article Two"],
        //     [ "title" => "Article Three"],
        // ];
        // $data = Article::all();
        $data = Article::latest()->paginate(5);
        return view('articles.index', [ 
            'articles' => $data
        ]);
    }

    public function detail($id) {

        $data = Article::find($id);
        return view('articles.detail', [ 
             "article" => $data
        ]);
    }

    public function add() {
       
        return view('articles.add');
    }

    public function create() {

        $article = new Article;
        $article->title  = request()->title;
        $article->body  = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        
        return redirect('/articles');
    }

    public function delete($id) {

        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with("message", "Article No.$article->id successfully deleted !!");
    }
}