<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\BusinessProfile;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Slide;
use App\Models\WorkingStep;

class HomeController extends Controller
{
    public function index()
    {
        $profile = BusinessProfile::first();
        $slides = Slide::where('is_active', true)->orderBy('order')->get();
        $services = Service::where('is_active', true)->orderBy('order')->get();
        $advantages = Advantage::orderBy('order')->get();
        $steps = WorkingStep::orderBy('order')->get();
        $gallery = GalleryImage::where('is_active', true)->orderBy('order')->get();

        return view('home', compact('profile', 'slides', 'services', 'advantages', 'steps', 'gallery'));
    }
}
