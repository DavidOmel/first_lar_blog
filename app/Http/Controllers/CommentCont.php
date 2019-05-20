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
   
    public function store(RequestComment $request, User $user, Article $article)
    {
        $comment = new Comment;
        $comment->created = time();
        $comment->article_id = $article->id;
        $comment->author = $user->name;
        $comment->author_id = $user->id;

        if ($user->isadmin == 1) $comment->icon = "/img/admin.png";
        else $comment->icon = "/img/user.png";

        $comment->text = preg_replace('#<[^>]+>#', ' ', $request->text);

        $comment->save();
        return redirect(route('articles.show', ['id' => $user->id, 'article' => $article]));

    }


    public function update(RequestComment $request, User $user, Article $article, Comment $comment)
    {
            $comment->text = $request->text_update;
            $comment->updated = time();
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
