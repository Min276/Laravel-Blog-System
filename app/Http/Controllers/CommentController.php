<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Comment;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware("auth");
    }

    public function create() {

        $comment = new Comment;
        $comment->content = request()->content;
        $comment->article_id = request()->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back()->with("message", "A comment added !");
    }

    public function delete($id) {
        $comment = Comment::find($id);

        if(Gate::allows("delete-comment", $comment)){
            $comment->delete();
            return back()->with("message", "A comment deleted !");
        }else {
            return back()->with("message", "Unauthorized to delete!");
        }
    }

}
