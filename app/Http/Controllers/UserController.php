<?php

namespace App\Http\Controllers;

use App\Mail\Change_password;
use App\Mail\Secure;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function list(User $user)
    {
        $users = User::all();
        return view('AdminProfile.list_users', ['user' => $user, 'users' => $users]);
    }



    public function restore_show(User $user){
        if ($user->email != null)return view('For_auth.restore_of_password',
            ['user' => $user]);

        else return view('For_auth.restore_of_password');

    }

    public function restore_send(Request $request){
        $this->validate($request, ['email_restore' => 'exists:users,email'],
            ['email_restore.exists' => '* Такой почты нет на сайте']);
        $user = User::where('email', $request->email_restore)->first();
        $letter = new Change_password($user);
        Mail::to($user)->send($letter);
        return view('For_auth.check-post', ['user' => $user]);
    }



    public function change_password(RequestUser $request, User $user){
        $user->password = md5($request->new_password);
        $user->updated_at = time();
        $user->save();
        return redirect(route('entry'));
    }



    public function destroy(User $user, User $user_del)
    {
        $user_del->delete();
        return redirect(route('users.list', ['user' => $user]));
    }
}
