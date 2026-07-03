<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\WorkerProfile;

class NearbyWorkerController extends Controller
{
    public function index()
    {
        $customer = auth()->user();

        $workers = WorkerProfile::with('user')
            ->where('is_verified',1)
            ->get();

        return view('customer.nearby-workers',compact(
            'customer',
            'workers'
        ));
    }
}