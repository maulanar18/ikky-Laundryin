<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Http\Request;

class AdvantageController extends Controller
{
    public function index()
    {
        $advantages = Advantage::orderBy('order')->get();

        return view('admin.advantages.index', compact('advantages'));
    }

    public function create()
    {
        return view('admin.advantages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        Advantage::create($validated);

        return redirect()->route('admin.advantages.index')->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    public function edit(Advantage $advantage)
    {
        return view('admin.advantages.edit', compact('advantage'));
    }

    public function update(Request $request, Advantage $advantage)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon_class' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $advantage->update($validated);

        return redirect()->route('admin.advantages.index')->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroy(Advantage $advantage)
    {
        $advantage->delete();

        return redirect()->route('admin.advantages.index')->with('success', 'Keunggulan berhasil dihapus.');
    }
}
