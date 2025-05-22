<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    /**
     * Display testimonials page
     */
    public function index()
    {
        $testimonials = Testimonial::getActive();
        
        return view('frontend.testimonials', compact('testimonials'));
    }
}