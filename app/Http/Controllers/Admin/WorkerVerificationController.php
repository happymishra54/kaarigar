<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkerProfile;

class WorkerVerificationController extends Controller
{
    public function index()
    {
        $workers = WorkerProfile::latest()
                    ->paginate(20);

        return view(
            'admin.worker-verifications.index',
            compact('workers')
        );
    }

    public function approve(WorkerProfile $worker)
    {
        $worker->update([
            'is_verified'=>true
        ]);

        return back();
    }
}