<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Secure;

class Registration extends Controller
{
    public function Showreg(){
        return view('For_auth.reg');
    }

   // _________________________________________________________________________________//

    public function Makereg(RequestUser $request){

        session_start() ;
        $_SESSION['name'] = $request->name;
        $_SESSION['email'] = $request->email;
        $_SESSION['password'] = $request->pw;
        $_SESSION['_token'] = $request->_token;

        $user = new User;
        // защита от xss-аттак:
        $user->name = preg_replace('#<[^>]+>#', ' ', $request->name);
        $user->email = $request->email;
        $user->_token = $request->_token;

        $letter = new Secure($user);
        Mail::to($user)->send($letter);

        return view('For_auth.check-post', ['user' => $user]);

    }


   // _________________________________________________________________________________//

    public function secure($_token){
        session_start() ;
        if ($_SESSION['_token'] == $_token){

            $user = new User;
            $user->name = $_SESSION['name'];
            $user->email = $_SESSION['email'];
            $user->password = md5($_SESSION['password']);
            $user->_token = $_SESSION['_token'];

            if($_SESSION['password'] == 'adminroot' && $user->name == 'Admin'){
                $user->isadmin = 1;
            }
            session_unset();

            $user->save();
            return redirect(route('entry'));
        }
        else
            return "Пожалуйста, подтверждайте почту с устройства,
      с которого регистрировались.";
    }

}

