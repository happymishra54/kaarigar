<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Service;

class ServiceController extends Controller
{
    public function show($slug)
    {
        $service = Service::where(
            'slug',
            $slug
        )->firstOrFail();

        return view(
            'user.services.show',
            compact('service')
        );
    }
}

