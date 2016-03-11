<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


class UserController extends Controller
{


    public function edit()
    {
        $usingPlatforms = array('xone' => false, 'x360' => false,
            'ps4' => false, 'ps3' => false, 'steam' => false);
        $user = Auth::user();
        $platforms = User::find($user->id)->platforms;
        foreach($platforms as $platform)
            $usingPlatforms[$platform['platform']] = true;

        return view('users.edit', ['user'=>$user, 'platforms'=>$platforms, 'usingPlatforms'=>$usingPlatforms]);
    }

}
