<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = BusinessProfile::firstOrNew(['id' => 1]);

        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'tagline' => 'nullable|string|max:255',
            'sub_tagline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price_info' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'working_hours' => 'nullable|string|max:255',
            'google_maps_link' => 'nullable|url|max:1000',
            'social_facebook' => 'nullable|url|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_twitter' => 'nullable|url|max:255',
        ]);

        BusinessProfile::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profil bisnis berhasil diperbarui.');
    }
}
