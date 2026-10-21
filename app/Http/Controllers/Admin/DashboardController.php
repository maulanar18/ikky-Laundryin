<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Slide;
use App\Models\WorkingStep;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'slides' => Slide::count(),
            'services' => Service::count(),
            'advantages' => Advantage::count(),
            'steps' => WorkingStep::count(),
            'gallery' => GalleryImage::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
