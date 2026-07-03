<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle(User $worker)
    {
        $customer = auth()->user();

        $favorite = Favorite::where('customer_id', $customer->id)
            ->where('worker_id', $worker->id)
            ->first();

        if ($favorite) {

            $favorite->delete();

        } else {

            Favorite::create([
                'customer_id' => $customer->id,
                'worker_id' => $worker->id
            ]);
        }

        return back();
    }

    public function index()
    {
        $favorites = Favorite::with('worker.workerProfile')
            ->where('customer_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.favorites', compact('favorites'));
    }
}