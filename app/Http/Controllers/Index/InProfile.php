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
        $categories = Category::all();
        $active_new = 'active';
        $articles = Article::all()->reverse();


        // Выборка по категории:
        if($category != null){
            $articles = $articles->where('category_id', $category);

            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles)/6);
            $articles = $articles->forPage($page, 6);

                return view('InProfile.index', ['active_new' => $active_new, 'user' => $user,
                    'articles' => $articles, 'categories' => $categories, 'category' => $category,
                    'pages' => $pages, 'page' => $page]);
            }

        //выборка из общего кол-ва:
        $pages = ceil(count($articles)/6);  // кол-во всех страниц
        $articles = $articles->forPage($page, 6);

        return view('InProfile.index', ['active_new' => $active_new, 'user' => $user,
            'articles' => $articles, 'categories' => $categories, 'category' => $category,
            'pages' => $pages, 'page' => $page]);
    }





    public function Popular(User $user, $page = 1, $category = null)
    {
        $active_pop = 'active';
        $categories = Category::all();
        $articles = Article::all()->sortByDesc('views');

        // Выборка по категории:
        if ($category != null) {
            $articles = $articles->where('category_id', $category);
            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles) / 6);
            $articles = $articles->forPage($page, 6);

            return view('InProfile.index', ['user' => $user, 'active_pop' => $active_pop,
                'articles' => $articles, 'categories' => $categories,
                'category' => $category, 'pages' => $pages, 'page' => $page]);
        }

        // Выборка из общего кол-ва

            $pages = ceil(count($articles) / 6); // кол-во всех страниц
             $articles = $articles->forPage($page, 6);

            return view('InProfile.index', ['user' => $user, 'active_pop' => $active_pop,
                'articles' => $articles, 'categories' => $categories,
                'category' => $category, 'pages' => $pages, 'page' => $page]);

    }
}
