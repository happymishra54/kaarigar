<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Booking;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\WorkerProfile;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'city',
        'address',
        'latitude',
        'longitude',
        'profile_image',
        'status'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function workerProfile()
    {
        return $this->hasOne(WorkerProfile::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isWorker()
    {
        return $this->role === 'worker';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    public function services()
    {
        return $this->hasMany(Service::class,'worker_id');
    }

    public function customerBookings()
    {
        return $this->hasMany(
            Booking::class,
            'customer_id'
        );
    }

    public function workerBookings()
    {
        return $this->hasMany(
            Booking::class,
            'worker_id'
        );
    }


    public function reviewsReceived()
    {
        return $this->hasMany(
            Review::class,
            'worker_id'
        );
    }

    public function reviewsGiven()
    {
        return $this->hasMany(
            Review::class,
            'customer_id'
        );
    }


}