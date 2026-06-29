<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [

        'worker_id',
        'category_id',
        'title',
        'slug',
        'description',
        'price',
        'image',
        'status'

    ];

    public function worker()
    {
        return $this->belongsTo(
            User::class,
            'worker_id'
        );
    }

    public function category()
    {
        return $this->belongsTo(
            Category::class
        );
    }

    public function bookings()
    {
        return $this->hasMany(
            Booking::class
        );
    }
}