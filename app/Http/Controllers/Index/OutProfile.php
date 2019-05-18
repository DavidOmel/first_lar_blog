<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use App\Models\Category;
use App\Models\Ip_address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OutProfile extends Controller
{
    public function New($page = 1, $category = null)
    {
        $categories = Category::all();
        $active_new = 'active';
        $articles = Article::all()->reverse();


        // Выборка по категории:
        if ($category != null) {
            $articles = $articles->where('category_id', $category);

            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles) / 6);
            $articles = $articles->forPage($page, 6);

            return view('OutProfile.index', ['active_new' => $active_new,
                'articles' => $articles, 'categories' => $categories, 'category' => $category,
                'pages' => $pages, 'page' => $page]);
        }

        //выборка из общего кол-ва:
        $pages = ceil(count($articles) / 6);  // кол-во всех страниц
        $articles = $articles->forPage($page, 6);

        return view('OutProfile.index', ['active_new' => $active_new,
            'articles' => $articles, 'categories' => $categories, 'category' => $category,
            'pages' => $pages, 'page' => $page]);
    }




    public function Popular($page = 1, $category = null){
        // проверка на нового посетителя:
        $now_ip = $_SERVER['REMOTE_ADDR'];
        $unique = Ip_address::where('address', $now_ip)->get()->IsEmpty();
        if($unique == true){
            $new_ip = new Ip_address();
            $new_ip->address = $now_ip;
            $new_ip->save();
        }


        $active_pop = 'active';
        $categories = Category::all();
        $articles = Article::all()->sortByDesc('views');

        // Выборка по категории:
        if ($category != null) {
            $articles = $articles->where('category_id', $category);
            // кол-во всех страниц в этой категории:
            $pages = ceil(count($articles) / 6);
            $articles = $articles->forPage($page, 6);

            return view('OutProfile.index', ['active_pop' => $active_pop,
                'articles' => $articles, 'categories' => $categories,
                'category' => $category, 'pages' => $pages, 'page' => $page]);
        }

        // Выборка из общего кол-ва

        $pages = ceil(count($articles) / 6); // кол-во всех страниц
        $articles = $articles->forPage($page, 6);

        return view('OutProfile.index', ['active_pop' => $active_pop,
            'articles' => $articles, 'categories' => $categories,
            'category' => $category, 'pages' => $pages, 'page' => $page]);
    }
}
