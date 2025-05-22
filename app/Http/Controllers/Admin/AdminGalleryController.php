<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of gallery items
     */
    public function index(Request $request)
    {
        $query = Gallery::orderBy('created_at', 'desc');
        
        // Filter by category
        if ($request->has('category') && !empty($request->category)) {
            $query->where('category', $request->category);
        }
        
        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $status = $request->status == '1';
            $query->where('is_active', $status);
        }
        
        $galleryItems = $query->paginate(9);
        $categories = Gallery::select('category')->distinct()->pluck('category');
        
        return view('admin.gallery.index', compact('galleryItems', 'categories'));
    }

    /**
     * Show the form for creating a new gallery item
     */
    public function create()
    {
        $categories = Gallery::select('category')->distinct()->pluck('category');
        return view('admin.gallery.create', compact('categories'));
    }

    /**
     * Store a newly created gallery item
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required_without:new_category|string|max:50',
            'new_category' => 'required_if:category,new|string|max:50',
            'is_active' => 'boolean'
        ]);
        
        $category = $request->category;
        if ($category === 'new' && $request->has('new_category')) {
            $category = $request->new_category;
        }
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $category,
            'is_active' => $request->has('is_active')
        ];
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }
        
        Gallery::create($data);
        
        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan ke galeri');
    }

    /**
     * Show the form for editing the gallery item
     */
    public function edit(Gallery $gallery)
    {
        $categories = Gallery::select('category')->distinct()->pluck('category');
        return view('admin.gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update the gallery item
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required_without:new_category|string|max:50',
            'new_category' => 'required_if:category,new|string|max:50',
            'is_active' => 'boolean'
        ]);
        
        $category = $request->category;
        if ($category === 'new' && $request->has('new_category')) {
            $category = $request->new_category;
        }
        
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category' => $category,
            'is_active' => $request->has('is_active')
        ];
        
        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }
            
            $data['image'] = $request->file('image')->store('gallery', 'public');
        }
        
        $gallery->update($data);
        
        return redirect()->route('admin.gallery.index')->with('success', 'Foto galeri berhasil diperbarui');
    }

    /**
     * Remove the gallery item
     */
    public function destroy(Gallery $gallery)
    {
        // Delete image
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }
        
        $gallery->delete();
        
        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus dari galeri');
    }
}