<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('completion_date', 'desc')->paginate(10);
        
        return view('admin.projects.index', compact('projects'));
    }
    
    public function create()
    {
        return view('admin.projects.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'featured_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'is_featured' => 'boolean',
        ]);
        
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }
        
        $validated['is_featured'] = $request->has('is_featured');
        
        Project::create($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil ditambahkan.');
    }
    
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client' => 'required|string|max:255',
            'completion_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'featured_image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_featured' => 'boolean',
        ]);
        
        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }
        
        $validated['is_featured'] = $request->has('is_featured');
        
        $project->update($validated);
        
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil diperbarui.');
    }
    
    public function destroy(Project $project)
    {
        // Delete project images
        foreach ($project->images as $image) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $image->delete();
        }
        
        // Delete featured image
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }
        
        $project->delete();
        
        return redirect()->route('admin.projects.index')->with('success', 'Proyek berhasil dihapus.');
    }
}