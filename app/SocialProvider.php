<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $table = 'social_providers_one';

    protected $fillable = ['user_id','provider_id','provider', 'avatarurl'];
    function user()
    {
          return $this->belongsTo(User::class);
    }
}
