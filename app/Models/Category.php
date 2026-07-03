<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'status'
    ];

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function getIconAttribute()
{
    $icons = [

        'electrician' => 'electrician.png',

        'plumber' => 'plumber.png',

        'carpenter' => 'carpenter.png',

        'painter' => 'painter.png',

        'cleaner' => 'cleaner.png',

        'mechanic' => 'mechanic.png',

    ];

    return asset(
        'images/categories/' .
        ($icons[strtolower($this->name)] ?? 'default.png')
    );
}
}