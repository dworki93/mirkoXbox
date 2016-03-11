<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Platform extends Model
{
    protected $fillable = [
        'active', 'platformNick', 'games', 'description', 'platform'
    ];

    protected $hidden = ['user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    static public function findOrAdd($user, $platformName)
    {
        $platform = Platform::where('user_id', $user->id)
            ->where('platform', $platformName)->first();
        if (!$platform)
        {
            $platform = new Platform();
            $platform->user_id = $user->id;
            $platform->active = 0;
            $platform->platform = $platformName;
            $platform->save();
        }
    }

    static public function deleteIfExists($user, $platformName)
    {
        $platform = Platform::where('user_id', $user->id)
            ->where('platform', $platformName)->first();
        if ($platform)
            $platform->delete();;
    }
}
