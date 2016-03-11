<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Config;


class UserController extends Controller
{




    public function index()
    {
        $users = User::all()->sortByDesc('id');
        return View('users.index', ['users' => $users]);
    }
}
