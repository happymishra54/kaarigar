<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteWorkerController extends Controller
{

    public function index()
{
    $favorites = Favorite::with([

        'worker.workerProfile',

    ])
    ->where(
        'customer_id',
        auth()->id()
    )
    ->latest()
    ->get();

    return response()->json([

        'success' => true,

        'favorites' => $favorites,

    ]);
}

    public function toggle(User $worker)
{
    $customer = auth()->user();

    $favorite = Favorite::where(
        'customer_id',
        $customer->id
    )
    ->where(
        'worker_id',
        $worker->id
    )
    ->first();

    if ($favorite) {

        $favorite->delete();

        return response()->json([

            'success' => true,

            'favorite' => false,

            'message' => 'Removed from favorites.'

        ]);

    }

    Favorite::create([

        'customer_id' => $customer->id,

        'worker_id' => $worker->id,

    ]);

    return response()->json([

        'success' => true,

        'favorite' => true,

        'message' => 'Added to favorites.'

    ]);
}

public function check(User $worker)
{
    $exists = Favorite::where(
        'customer_id',
        auth()->id()
    )
    ->where(
        'worker_id',
        $worker->id
    )
    ->exists();

    return response()->json([

        'success' => true,

        'favorite' => $exists,

    ]);
}

public function destroy(User $worker)
{
    Favorite::where(
        'customer_id',
        auth()->id()
    )
    ->where(
        'worker_id',
        $worker->id
    )
    ->delete();

    return response()->json([

        'success' => true,

        'message' => 'Removed successfully.'

    ]);
}

}