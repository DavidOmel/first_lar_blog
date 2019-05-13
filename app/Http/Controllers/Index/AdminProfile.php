<?php

namespace App\Http\Controllers\Index;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Ip_address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProfile extends Controller
{
    public function show(User $user){
        $visitors = count(Ip_address::all());
        return view('AdminProfile.index', ['user' => $user, 'visitors' => $visitors]);
    }
}
