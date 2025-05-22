<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:50',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);
        
        $imagePath = $request->file('image')->store('services', 'public');
        
        Service::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'image' => $imagePath,
            'icon' => $request->icon,
            'is_featured' => $request->has('is_featured'),
            'order' => $request->order ?? 0
        ]);
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    /**
     * Show the form for editing the service
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the service
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'short_description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'icon' => 'nullable|string|max:50',
            'is_featured' => 'boolean',
            'order' => 'nullable|integer|min:0'
        ]);
        
        $data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'icon' => $request->icon,
            'is_featured' => $request->has('is_featured'),
            'order' => $request->order ?? 0
        ];
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            
            $imagePath = $request->file('image')->store('services', 'public');
            $data['image'] = $imagePath;
        }
        
        $service->update($data);
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui');
    }

    /**
     * Remove the service
     */
    public function destroy(Service $service)
    {
        // Delete image
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus');
    }
}