<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [

        'customer_id',
        'worker_id'

    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class,'worker_id');
    }
}