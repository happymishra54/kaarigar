<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WorkerServiceController extends Controller
{
    public function index()
    {
        $services = Service::where(
            'worker_id',
            auth()->id()
        )->latest()->get();

        return response()->json([
            'success' => true,
            'services' => $services,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service = Service::create([
            'worker_id' => auth()->id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
            'status' => 'active',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully.',
            'service' => $service,
        ], 201);
    }

    public function update(Request $request, Service $service)
    {
        if ($service->worker_id != auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $service->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully.',
            'service' => $service,
        ]);
    }

    public function destroy(Service $service)
    {
        if ($service->worker_id != auth()->id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully.',
        ]);
    }
}