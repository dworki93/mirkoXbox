<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Libraries\libs_Wapi;
use Illuminate\Support\Facades\Config;



class AuthController extends Controller
{



    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    private $wapi;

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
        $key = Config::get('wykop.key');
        $secret = Config::get('wykop.secret');
        $this->wapi = new libs_Wapi($key, $secret);
    }

    public function authenticate()
    {
        if (!empty($_GET['connectData']))
        {
            $connectData = $this->wapi->handleConnectData();
            $result = $this->wapi->doRequest('user/login', array('login' => $connectData['login'],
                'accountkey' => $connectData['token']));
            if(!empty($result))
            {
                $user = User::where('wykopNick', '=', $result['login']);
                if($user)
                {
                    Auth::login($user);
                    //return redirect()->intended('dashboard');
                }
                else
                {
                    $user -> wykopNick = $result['login'];
                    $user -> avatar = $result['avatar'];
                    $user->save();
                    //return redirect()->intended('dashboard');
                }
            }
        }

    }


}
