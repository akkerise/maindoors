<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccountService;

class SocialAdminController extends Controller
{
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service){
//        $providerUser = Socialite::driver('facebook')->user();
        $user = $service->createOrGetUser(Socialite::driver('facebook'))->user();
        dd($user);
        auth()->login($user);
        return $this->redirect('/');
    }
}
