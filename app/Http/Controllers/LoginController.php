<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Libraries\libs_Wapi;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


use App\Http\Requests;

class LoginController extends Controller
{
    private $wapi;

    public function __construct()
    {
        $key = Config::get('wykop.key');
        $secret = Config::get('wykop.secret');
        $this->wapi = new libs_Wapi($key, $secret);
    }

    public function authenticateWithWykop($connectData)
    {
        $postData = $this->wapi->handleConnectData($connectData);

        $result = $this->wapi->doRequest('user/login', array('login' => $postData['login'],
            'accountkey' => $postData['token']));

        if ($this->wapi->isValid())
            return $result;
        else
        {
            echo $this->wapi->getError();
        }
    }

    public function login()
    {
        if (Auth::check() || !Input::has('connectData'))
            return redirect('/');
        else
        {
            $userData = $this->authenticateWithWykop(Input::get('connectData'));
            $user = User::findOrAddUser($userData);
            Auth::login($user);
            return redirect('/');
        }
    }

    public function logout()
    {
        if (Auth::check())
            Auth::logout();
         return redirect('/');
    }

    public function getLoginLink()
    {
        if(!Auth::check()) {
            $loginLink = $this->wapi->getConnectUrl('http://mirkobox/login');
            return redirect()->away($loginLink);
        }

        return redirect('/');
    }

}
