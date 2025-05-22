<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display all services
     */
    public function index()
    {
        $services = Service::orderBy('order')->get();
        return view('frontend.services.index', compact('services'));
    }
    
    /**
     * Display a specific service
     */
    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedServices = Service::where('id', '!=', $service->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
            
        return view('frontend.services.show', compact('service', 'relatedServices'));
    }
}