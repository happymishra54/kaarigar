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

    public function getImageAttribute()
{
    $images = [

        'electrician' => 'electrician.jpg',

        'plumber' => 'plumber.jpg',

        'carpenter' => 'carpenter.jpg',

        'painter' => 'painter.jpg',

        'cleaner' => 'cleaning.jpg',

    ];

    foreach($images as $keyword => $image){

        if(str_contains(strtolower($this->title), $keyword)){

            return asset("images/services/".$image);

        }

    }

    return asset("images/services/default.jpg");
}

}