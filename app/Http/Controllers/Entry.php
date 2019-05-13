<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Article;
use App\Models\Comment;

class Entry extends Controller
{
    public function Showsec(){
        return view('For_auth.entry');
    }
    public function Makesec(Request $request)
    {
        $password = md5($request->password);

        $secure_password = false;
        $error['val_pw'] = $request->password;
        $error['val_email'] = $request->email;


        $users = User::all();

          //проверка почты:
        $user = User::where('email', $request->email)->first();
               //проверка пароля:
          if(isset($user->password)){
              if ($user->password == $password)$secure_password = true;
          }

        //если авторизация - успешна:
        if ($secure_password == true) {

            $user->_token = $request->_token;
            $user->save();

            if ($user->isadmin != 0) {
                return redirect(route('AdminProfile', ['user' => $user->id]));
            } else return redirect(route('InProfile', ['user' => $user->id]));
        }

        //непрравильный пароль:
        if ($secure_password == false && $user != null) {
            $error['password'] = " * Вы ввели неправильно пароль!";
            return view('For_auth.entry', ['error' => $error]);
        }

        //если такой записи не существует:
        $error['email'] = "* Этой почты нет на сайте, введите правильно данные";
        return view('For_auth.entry', ['error' => $error]);
    }

}
