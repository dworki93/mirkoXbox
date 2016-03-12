<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nick', 'age', 'avatar',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function platforms()
    {
        return $this->hasMany('App\Platform');
    }

    public static function findOrAddUser($userData)
    {
        $user = User::where('wykopNick', $userData['login'])->first();
        if (!$user)
        {
            $user = new User();
            $user->nick = $userData['login'];
            $user->avatar = $userData['avatar'];
            $user->save();
        }
        return $user;
    }
}
