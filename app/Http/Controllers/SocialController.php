<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\User;

class SocialController extends Controller
{
    public function redirect($provider)
    {
     return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
	    $userSocial = Socialite::driver($provider)->stateless()->user();

	    //Check if user exist, if yes, then login otherwise create new
	    $users  =  User::where(['email' => $userSocial->getEmail()])->first();
		if($users){
		    Auth::login($users);
		    return redirect()->route('home');
		}else{
			$user = User::create([
                'name'          => $userSocial->getName(),
                'email'         => $userSocial->getEmail(),
                'image'         => $userSocial->getAvatar(),
                'provider_id'   => $userSocial->getId(),
                'provider'      => $provider,
            ]);

		//Login after successful registration
        $newlogin  =  User::where(['email' => $userSocial->getEmail()])->first();
		Auth::login($newlogin);
		
        return redirect()->route('home');
        }
	}
}
