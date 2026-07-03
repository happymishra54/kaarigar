<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkerProfile extends Model
{
    protected $fillable = [

        'user_id',

        'aadhaar_number',

        'aadhaar_image',

        'profile_image',

        'bio',

        'experience',

        'address',

        'city',

        'state',

        'latitude',

        'longitude',

        'daily_wage',

        'is_verified'

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}