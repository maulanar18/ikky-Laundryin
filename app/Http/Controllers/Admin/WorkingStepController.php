<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkingStep;
use Illuminate\Http\Request;

class WorkingStepController extends Controller
{
    public function index()
    {
        $steps = WorkingStep::orderBy('order')->get();

        return view('admin.steps.index', compact('steps'));
    }

    public function create()
    {
        return view('admin.steps.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        WorkingStep::create($validated);

        return redirect()->route('admin.steps.index')->with('success', 'Langkah cara kerja berhasil ditambahkan.');
    }

    public function edit(WorkingStep $step)
    {
        return view('admin.steps.edit', compact('step'));
    }

    public function update(Request $request, WorkingStep $step)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $step->update($validated);

        return redirect()->route('admin.steps.index')->with('success', 'Langkah cara kerja berhasil diperbarui.');
    }

    public function destroy(WorkingStep $step)
    {
        $step->delete();

        return redirect()->route('admin.steps.index')->with('success', 'Langkah cara kerja berhasil dihapus.');
    }
}
