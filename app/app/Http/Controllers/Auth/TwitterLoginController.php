<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class TwitterLoginController extends Controller
{
    // twitter認証画面へ
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    // 認証後の処理
    public function handleProviderCallback()
    {
        try {
            $twitter_user = Socialite::driver('twitter')->user();
            $user = $this->checkUserRegister($twitter_user);
            \Auth::login($user);
        } catch (\Exception $e) {
            return redirect('login/twitter');
        }

        return redirect('/');
    }

    // TwitterのUserがDBに登録していなかったら登録する
    protected function checkUserRegister($twitter_user)
    {
        $user = User::where("twitter_id", '=', $twitter_user->id)->first();
        if (empty($user)) {
            $user = User::create([
                "twitter_id" => $twitter_user->id,
                "twitter_nickname" => $twitter_user->nickname,
                'name' => $twitter_user->name,
                'email' => $twitter_user->email,
                'twitter_avator' => $twitter_user->avatar,
                'password' => \Hash::make('test1234'),
            ]);
        }

        return $user;
    }
}
