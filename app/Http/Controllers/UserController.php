<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Libraries\libs_Wapi;
use Illuminate\Support\Facades\Config;


class UserController extends Controller
{




    public function index()
    {
        $users = User::all()->sortByDesc('id');
        $key = Config::get('wykop.key');
        $secret = Config::get('wykop.secret');
        $wapi = new libs_Wapi($key, $secret);
        $loginLink = $wapi->getConnectUrl('http://mirkobox/login');
        return View('users.index', ['users' => $users, 'loginLink' => $loginLink ]);
    }
}
