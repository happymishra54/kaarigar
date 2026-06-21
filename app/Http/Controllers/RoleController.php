<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function becomeCustomer()
    {
        auth()->user()->update([
            'role' => 'customer'
        ]);

        return redirect()->route(
            'customer.dashboard'
        );
    }

    public function becomeWorker()
    {
        auth()->user()->update([
            'role' => 'worker'
        ]);

        return redirect()->route(
            'worker.dashboard'
        );
    }
}