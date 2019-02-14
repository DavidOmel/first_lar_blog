<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Registration extends Controller
{
    public function Showreg(){
        return view('reg');
    }

    public function Makereg(Request $request){
        session_start() ;
        $_SESSION['name'] = $request->name;
        $_SESSION['email'] = $request->email;
        $_SESSION['password'] = $request->password;

        $this->validate($request, [
            'name' => 'alpha_dash|max:50',
            'email' => 'unique:users',
            'password' => 'digits_between:5,16|same:confirm',
        ]);

         //удаление данных сессий после успешной регистрации:
        $_SESSION['name'] = null;
        $_SESSION['email'] = null;
        $_SESSION['password'] = null;


        $data = $request->all();
        $user = new User;
        $user->fill($data);
        $user->save();
        return redirect(route('entry'));

    }

    }

