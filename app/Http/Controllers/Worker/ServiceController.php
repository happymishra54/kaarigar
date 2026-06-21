<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where(
            'worker_id',
            auth()->id()
        )->latest()->get();

        return view(
            'worker.services.index',
            compact('services')
        );
    }


    public function create()
    {
        $categories = Category::all();

        return view(
            'worker.services.create',
            compact('categories')
        );
    }




public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'title' => 'required',
        'description' => 'nullable',
        'price' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imageName = null;

    if ($request->hasFile('image')) {

        $imageName = $request
            ->file('image')
            ->store('services', 'public');

    }

    Service::create([

        'worker_id' => auth()->id(),

        'category_id' => $request->category_id,

        'title' => $request->title,

        'slug' => Str::slug($request->title).'-'.time(),

        'description' => $request->description,

        'price' => $request->price,

        'image' => $imageName,

        'status' => true

    ]);

    return redirect()
        ->route('services.index')
        ->with(
            'success',
            'Service Added Successfully'
        );
}




    public function edit(Service $service)
    {
        abort_if(
            $service->worker_id != auth()->id(),
            403
        );

        $categories = Category::all();

        return view(
            'worker.services.edit',
            compact(
                'service',
                'categories'
            )
        );
    }



    public function update(
        Request $request,
        Service $service
    )
    {
        abort_if(
            $service->worker_id != auth()->id(),
            403
        );
        $request->validate([

            'category_id' => 'required',

            'title' => 'required',

            'description' => 'required',

            'price' => 'required|numeric'

        ]);

        $service->update([

            'category_id' => $request->category_id,

            'title' => $request->title,

            'description' => $request->description,

            'price' => $request->price

        ]);

        return redirect()
            ->route('services.index')
            ->with(
                'success',
                'Service updated successfully'
            );
    }


    public function destroy(Service $service)
    {
        abort_if(
            $service->worker_id != auth()->id(),
            403
        );

        $service->delete();

        return redirect()
            ->route('services.index')
            ->with(
                'success',
                'Service Deleted Successfully'
            );
    }



}