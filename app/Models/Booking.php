<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [

        'booking_number',
        'customer_id',
        'worker_id',
        'service_id',
        'booking_date',
        'booking_time',
        'address',
        'amount',
        'status'

    ];

    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id');
    }

    public function worker()
    {
        return $this->belongsTo(User::class,'worker_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function review()
    {
        return $this->hasOne(
            Review::class
        );
    }


}