<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class PlatformController extends Controller
{
    public function index($name = 'xone')
    {
        $platforms = Platform::where('active', 1)
            ->where('platform', $name)
            ->orderBy('platformNick', 'asc')
            ->get();

        return View('platforms.index', ['platforms' => $platforms, 'name' => $name]);
    }

    public function add()
    {
        $user = Auth::user();

        if(Input::has('xone'))
            Platform::findOrAdd($user, 'xone');
        else
            Platform::deleteIfExists($user, 'xone');
        if(Input::has('x360'))
            Platform::findOrAdd($user, 'x360');
        else
            Platform::deleteIfExists($user, 'x360');
        if(Input::has('ps4'))
            Platform::findOrAdd($user, 'ps4');
        else
            Platform::deleteIfExists($user, 'ps4');
        if(Input::has('ps3'))
            Platform::findOrAdd($user, 'ps3');
        else
            Platform::deleteIfExists($user, 'ps3');
        if(Input::has('steam'))
            Platform::findOrAdd($user, 'steam');
        else
            Platform::deleteIfExists($user, 'steam');

        return redirect('profile/edit');
    }
}
