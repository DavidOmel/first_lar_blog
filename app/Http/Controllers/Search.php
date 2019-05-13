<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;

class Search extends Controller
{
    public  function  users(Request $request, User $user){
       $users = User::where('name', $request->name)->get();
        return view('AdminProfile.list_users', ['user' => $user, 'users' => $users]);
    }

    public function articles(Request $request, User $user){

        $articles = Article::where('title', $request->title)->get();
        return view('AdminProfile.list_articles', ['user' => $user,
            'articles' => $articles]);
    }
}
