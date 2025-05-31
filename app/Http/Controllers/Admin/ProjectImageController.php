<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index(Project $project)
    {
        $images = $project->images()->orderBy('order')->get();
        
        return view('admin.projects.images.index', compact('project', 'images'));
    }
    
    public function create(Project $project)
    {
        return view('admin.projects.images.create', compact('project'));
    }
    
    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'caption' => 'nullable|string|max:255',
            'order' => 'integer',
        ]);
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('projects/gallery', 'public');
        }
        
        $validated['project_id'] = $project->id;
        
        ProjectImage::create($validated);
        
        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar proyek berhasil ditambahkan.');
    }
    
    public function edit(Project $project, ProjectImage $image)
    {
        return view('admin.projects.images.edit', compact('project', 'image'));
    }
    
    public function update(Request $request, Project $project, ProjectImage $image)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'caption' => 'nullable|string|max:255',
            'order' => 'integer',
        ]);
        
        if ($request->hasFile('image')) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
            $validated['image'] = $request->file('image')->store('projects/gallery', 'public');
        }
        
        $image->update($validated);
        
        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar proyek berhasil diperbarui.');
    }
    
    public function destroy(Project $project, ProjectImage $image)
    {
        if ($image->image) {
            Storage::disk('public')->delete($image->image);
        }
        
        $image->delete();
        
        return redirect()->route('admin.projects.images.index', $project)->with('success', 'Gambar proyek berhasil dihapus.');
    }
}