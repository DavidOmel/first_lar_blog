<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Entry extends Controller
{
    public function Showsec(){
        return view('entry');
    }
    public function Makesec(Request $request){

        //преобразование для удобства
        $email = $request->email;
        $password = $request->password;
        $token = $request->_token;
        $rem = $request->remeber;

        $user = User::all();

        //перебераем каждую запись, чтобы определить пользователя по введенным данным
        foreach ($user as $line){
            $EDB = $line->email;
            $PDB = $line->password;
            //если авторизация - успешна:
            if($EDB == $email && $PDB == $password){

                //условие для отправки токена
                if($rem == true){
                    $line->remember_token = $token;
                    $line->save();
                }

                return view('index', ['user' => $line]);
            }

            //непрравильный пароль:
            if($EDB == $email && $PDB != $password){
                return " Вы ввели неправильно пароль!";
            }
        }
        return 'Такой пользователь незарегистрирован на сайте. 
                Введите правильно свои данные!!!'.$EDB;



        //dd($request->all());
    }

}
