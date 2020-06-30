<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{


    public function show(User $user)
    {
        $saas = $user->apps;
        return view('profile', compact('user', 'saas'));
    }

    public function notifications()
    {

        $usernotifications = [];

        foreach (currentUser()->notifications as $notification) {
           foreach ($notification->data as $notify) {
                array_push($usernotifications, $notify);
           }
        }
     
        return view('notifications', compact('usernotifications'));

    }


}
