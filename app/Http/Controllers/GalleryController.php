<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display gallery page
     */
    public function index()
    {
        $galleryItems = Gallery::getActive();
        $categories = Gallery::getCategories();
        
        return view('frontend.gallery', compact('galleryItems', 'categories'));
    }
}