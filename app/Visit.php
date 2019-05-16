<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{

    use HasTimestamps;
    protected $fillable = [
        'device', 'url', 'ip', 'platform','country','total_number','browser','user_id'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

}
