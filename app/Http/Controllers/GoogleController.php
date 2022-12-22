<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
             public function logingoogle(){
                return Socialite::driver('google')->redirect();
            }

            public function regislogin($data){
                $user = User::where('email','=',$data->email)->first();
                if(!$user){
                    $user = new User();
                    $user->name = $data->name;
                    $user->email = $data->email;
                    $user->provider_id = $data->provider_id;
                    $user->save();
                }
                Auth::login($user);
            }

            public function callbackgoogle(){
                $user = Socialite::driver('google')->user();
                $this->regislogin($user);
                return redirect('/home');
            }
}


