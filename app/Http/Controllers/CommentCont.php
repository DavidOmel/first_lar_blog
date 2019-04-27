<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use App\Http\Requests\RequestComment;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;

class CommentCont extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(RequestComment $request, User $user, Article $article)
    {
        $comment = new Comment;
        $comments = $comment->all();
        $comment->article_id = $article->id;
        $comment->author = $user->name;
        $comment->author_id = $user->id;
        $comment->text = preg_replace('#<[^>]+>#', ' ', $request->text);

        $comment->save();
        return redirect(route('articles.show', ['id' => $user->id, 'article' => $article]));

    }



    public function show($id)
    {
        //
    }



    public function edit($id)
    {
        //
    }


    public function update(RequestComment $request, User $user, Article $article, Comment $comment)
    {
            $comment->text = $request->text_update;
            $comment->update();

            return redirect(route('articles.show', ['id' => $user->id,
                'article' => $article->id]));
    }


    public function destroy( User $user, Article $article, Comment $comment)
    {
        $comment->delete();

        return redirect(route('articles.show', ['user' => $user->id,
            'article' => $article->id]));
    }
}
