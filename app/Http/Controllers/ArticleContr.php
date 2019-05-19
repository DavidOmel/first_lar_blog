<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Comment;
use App\Models\Ip_address;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ArticleContr extends Controller
{

    public function list(User $user)
    {
        $articles = Article::all()->where('author', $user->name);
        return view('AdminProfile.list_articles', ['user' => $user,
          'articles' => $articles]);
    }


    public function create(User $user)
    {
        $categories = Category::all();
        return view('AdminProfile.create', ['user' => $user, 'categories' => $categories]);
    }


    public function store(RequestArticle $request, User $user)
    {
        // добавление файла:
        $path = $request->file('photo')->store('newfiles', 'public');

        $category = Category::where('name', $request->category)->first();
        $article = new Article;

        $short_text = null;
        $k = 0;

        // обрезка для short_text:
        foreach (str_split($request->full_text) as $char){
            if($k >= 300){
                if ($char == '.' || $char == ' ' || $char == '!' || $char == '?' || $char == ','){
                    $short_text .= '...';
                    break;
                }
            }
            $short_text .= $char;
            $k++;
        }

        $article->created_at = time();
        $article->short_text = $short_text;
        $article->img = $path;
        $article->category_id = $category->id;
        $article->category_name = $category->name;
        $article->author = $user->name;
        $article->fill($request->all());
        $article->save();
        return redirect(route('AdminProfile', ['user' => $user->id]));
    }


    public function show( User $user, Article $article)
    {
        // проверка на нового посетителя в общем:
        $now_ip = $_SERVER['REMOTE_ADDR'];

        $ip_id = Ip_address::where('address', $now_ip)->value('id');
        $unique = !(is_integer($ip_id));
        if($unique == true){
            // пользователь первый раз посетил сайт
            $new_ip = new Ip_address();
            $new_ip->address = $now_ip;
            $new_ip->created_at = time();
            $new_ip->save();

            $article->views += 1;
            $article->views_ip_id .= $new_ip->id.',';
            $article->save();
        }


        else{
            // пользователь ранее посещал сайт
            $watched = str_split($article->views_ip_id);
            $watched_id = null;
            foreach ($watched as $letter){
                if($letter == ','){
                    if ($ip_id == $watched_id){
                        $add = false;
                        break;
                    }
                    else{
                        $watched_id = null;
                        $add = true;
                    }
                }
                else {
                    $watched_id .= $letter;
                    $add = true;
                }
            }

            // добавление просмотра
            if ($add == true){
                $article->views_ip_id .= $ip_id.',';
                $article->views += 1;
                $article->save();
            }
        }




        $comments = Comment::all()->where('article_id', $article->id)->reverse();
        return view('InProfile.show', ['user' => $user,
            'article' => $article, 'comments' => $comments]);
    }


        public function showOut(Article $article) {
            // проверка на нового посетителя в общем:
            $now_ip = $_SERVER['REMOTE_ADDR'];
            $ip_id = Ip_address::where('address', $now_ip)->value('id');
            $unique = !(is_integer($ip_id));
            if($unique == true){
                // пользователь первый раз посетил сайт
                $new_ip = new Ip_address();
                $new_ip->address = $now_ip;
                $new_ip->save();

                $article->views += 1;
                $article->views_ip_id .= $new_ip->id.',';
                $article->save();
            }

            else{
                // пользователь ранее посещал сайт
                $watched = str_split($article->views_ip_id);
                $watched_id = null;
                foreach ($watched as $letter){
                    if($letter == ','){
                        if ($ip_id == $watched_id){
                            $add = false;
                            break;
                        }
                        else{
                            $watched_id = null;
                            $add = true;
                        }
                    }
                    else {
                        $watched_id .= $letter;
                        $add = true;
                    }
                }

                // добавление просмотра
                if ($add == true){
                    $article->views_ip_id .= $ip_id.',';
                    $article->views += 1;
                    $article->save();
                }
            }

            $comments = Comment::all()->where('article_id', $article->id)->reverse();
            return view('OutProfile.show', ['article' => $article,
                'comments' => $comments]);
    }


    public function edit(User $user, Article $article)
    {
        $categories = Category::where('name', '!=', $article->category_name)->get();

        return view('AdminProfile.edit', ['user' => $user,
            'article' => $article,'categories' => $categories]);
    }


    public function update(RequestArticle $request, User $user, Article $article)
    {
        // обновление фото:
        if($request->photo != null){
            $path = $request->file('photo')->store('newfiles', 'public');
            Storage::disk('public')->delete($article->img);
            $article->img = $path;
        }

        $short_text = null;
        $k = 0;

        // обрезка для short_text:
        foreach (str_split($request->full_text) as $char){
            if($k >= 300){
                if ($char == '.' || $char == ' ' || $char == '!' || $char == '?' || $char == ','){
                    $short_text .= '...';
                    break;
                }
            }
            $short_text .= $char;
            $k++;
        }


        $article->short_text = $short_text;
        $article->updated_at = time();

        $category = Category::where('name', $request->category)->first();
        $article->category_id = $category->id;
        $article->category_name = $request->category;
        $article->fill($request->all());
        $article->save();

        return redirect(route('articles.show', ['article' => $article, 'user' => $user]));

    }


    public function destroy(Request $request, User $user, Article $article)
    {
        $comments = Comment::all()->where('article_id', $article);
        $articles = Article::all()->where('author', $user->name);

       // при удалении статьи - удаление всех ее комментов:

        foreach ($comments as $comment) {
            if($comment->id != 0)$comment->delete();
            else break;
        }

        Storage::disk('public')->delete($article->img);

        $article->delete();

       return redirect(route('articles.list', ['user' => $user,
           'articles' => $articles]));
    }
}
