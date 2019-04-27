<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InProfile extends Controller
{

    public function New(User $user, $page = 1, $category = null){
        $articles = Article::all()->reverse();
        $categories = Category::all();
        $active_new = 'active';

        // Выборка по категории:
        if($category != null){
            $articles = $articles->where('category_id', $category);
            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles)/6);

            if($page > 1){
                // кол-во предыдущих статей:
                $last_articles = ($page - 1)*6;
                $latest_id = $articles->take($last_articles)->min()->id;

                $articles = $articles->where('id', '<', $latest_id)->take(6);

                return view('InProfile\index', ['active_new' => $active_new, 'user' => $user, 'articles' => $articles,
                    'categories' => $categories, 'category' => $category, 'pages' => $pages, 'page' => $page]);
            }

            else{
                $articles = $articles->take(6);
                return view('InProfile\index', ['active_new' => $active_new, 'user' => $user, 'articles' => $articles,
                    'categories' => $categories, 'category' => $category,
                    'pages' => $pages, 'page' => $page]);
            }
        }

        //выборка из общего кол-ва:
        $pages = ceil(count($articles)/6);  // кол-во всех страниц
        if($page > 1){
            // кол-во предыдущих статей:
            $last_articles = ($page - 1)*6;
            $latest_id = $articles->take($last_articles)->min()->id;

            $articles = $articles->where('id', '<', $latest_id)->take(6);
            return view('InProfile\index', ['active_new' => $active_new, 'user' => $user, 'articles' => $articles,
                'categories' => $categories, 'category' => $category, 'pages' => $pages, 'page' => $page]);
        }

        else{
            $articles = $articles->take(6);
            return view('InProfile\index', ['active_new' => $active_new, 'user' => $user, 'articles' => $articles,
                'categories' => $categories, 'category' => $category, 'pages' => $pages, 'page' => $page]);
        }
    }


    public function Popular(User $user, $page = 1, $category = null){
        $articles = Article::all()->sortByDesc('views');
        $categories = Category::all();
        $active_pop = 'active';

        // Выборка по категории:
        if($category != null){
            $articles = $articles->where('category_id', $category);
            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles)/6);

            if($page > 1){
                // кол-во предыдущих статей:
                $last_articles = ($page - 1)*6;
                $latest_views = $articles->take($last_articles)->min('views');

                $articles = $articles->where('views', '<', $latest_views)->take(6);

                return view('InProfile\index', ['user' => $user, 'active_pop' => $active_pop,
                    'articles' => $articles, 'categories' => $categories,
                    'category' => $category, 'pages' => $pages, 'page' => $page]);
            }

            else{
                $articles = $articles->take(6);
                return view('InProfile\index', ['user' => $user, 'active_pop' => $active_pop,
                    'articles' => $articles, 'categories' => $categories, 'category' => $category,
                    'pages' => $pages, 'page' => $page]);
            }
        }

        //выборка из общего кол-ва:
        $pages = ceil(count($articles)/6); // кол-во всех страниц
        if($page > 1){
            // кол-во предыдущих статей:
            $last_articles = ($page - 1)*6;
            $latest_views = $articles->take($last_articles)->min('views');

            $articles = $articles->where('views', '<', $latest_views)->take(6);
            return view('InProfile\index', ['user' => $user, 'active_pop' => $active_pop,
                'articles' => $articles, 'categories' => $categories,
                'category' => $category, 'pages' => $pages, 'page' => $page]);
        }

        else{
            $articles = $articles->take(6);
            return view('InProfile\index', ['user' => $user, 'active_pop' => $active_pop,
                'articles' => $articles, 'categories' => $categories,
                'category' => $category, 'pages' => $pages, 'page' => $page]);
        }
    }
}
