<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Comment;
use App\Article;

class CommentsController extends Controller
{
    public function store(CommentRequest $request, Article $article)
    {
        $params=$request->all();
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->article_id = $request->article_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        $article = Article::findOrFail($params['article_id']);





        // return view('articles.show', ['article' => $article]);


        return redirect()->route('articles.show', ['article' => $article])->with('flash_message', 'コメント投稿が完了しました');
    }
}