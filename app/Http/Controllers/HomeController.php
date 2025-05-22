<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Gallery;

class HomeController extends Controller
{
    /**
     * Show the homepage
     */
    public function index()
    {
        $featuredServices = Service::getFeatured();
        $testimonials = Testimonial::getActive()->take(6);
        $galleryItems = Gallery::getActive()->take(6);
        
        return view('frontend.home', compact('featuredServices', 'testimonials', 'galleryItems'));
    }
    
    /**
     * Show the about page
     */
    public function about()
    {
        return view('frontend.about');
    }
}