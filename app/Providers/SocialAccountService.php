<?php
/**
 * Created by PhpStorm.
 * User: akke
 * Date: 5/26/17
 * Time: 11:27 AM
 */

namespace App;

use App\Http\Controllers\Admin\SocialAdminController;
use Laravel\Socialite\Contracts\User as ProviderUser;


class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $accout = SocialAccout::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();
        if ($accout) {
            return $accout->user;
        } else {
            $accout = new SocialAccout([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $user = User::where($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName()
                ]);

                $accout->user()->associate($user);
                $accout->save();

                return $user;
            }
        }
    }
}