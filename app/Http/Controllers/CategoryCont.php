<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryCont extends Controller
{

    public function create(User $user)
    {
        $categories = Category::all();
        return view('AdminProfile.category', ['user' => $user, 'categories' => $categories]);
    }


    public function store(RequestCategory $request, User $user)
    {
        $categories = Category::all();

        $category = new Category;
        $category->name = $request->category;
        $category->save();

        return redirect(route('categories.create', ['user' => $user->id]));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(RequestCategory $request, User $user, Category $category)
    {
        $categories = Category::all();
        $category->name = $request->category_update;
        $category->save();
        return redirect(route('categories.create',
            ['user' => $user, 'categories' => $categories]));
    }


    public function destroy(User $user, Category $category)
    {
        $categories = Category::all();
        $category->delete();

        return redirect(route('categories.create', ['user' => $user]));
    }
}
