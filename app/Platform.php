<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Platform extends Model
{
    protected $fillable = [
        'active', 'nick', 'games', 'info', 'type'
    ];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function findOrAdd($user, $platformName)
    {
        $platform = Platform::where('user_id', $user->id)
            ->where('type', $platformName)->first();
        if (!$platform)
        {
            $platform = new Platform();
            $platform->user_id = $user->id;
            $platform->active = 0;
            $platform->type = $platformName;
            $platform->save();
        }
    }

    public static function deleteIfExists($user, $platformName)
    {
        $platform = Platform::where('user_id', $user->id)
            ->where('type', $platformName)->first();
        if ($platform)
            $platform->delete();;
    }
}
