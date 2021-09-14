<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailConfirmationController extends Controller
{
    public function confirmation($user_id, $token)
    {
        $user = User::find($user_id);
        if ($user === null)
        {
            abort(404);
        }

        if ($user->token == $token)
        {
            $user->emailConfirm();
            Auth::login($user);

            return redirect()->route('user.download')->with('success','Реєстрація пойшла успішно!');
        }
        else
        {
            return redirect()->route('index')->with('error','Щось трапилось (:');
        }
    }
}
