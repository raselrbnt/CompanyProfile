<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order')->paginate(10);
        
        return view('admin.services.index', compact('services'));
    }
    
    public function create()
    {
        return view('admin.services.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);
        
        if ($request->hasFile('icon')) {
            $validated['icon'] = $request->file('icon')->store('services/icons', 'public');
        }
        
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('services/images', 'public');
        }
        
        $validated['is_active'] = $request->has('is_active');
        
        Service::create($validated);
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }
    
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }
    
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|image|mimes:svg,png,jpg,jpeg|max:2048',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'is_active' => 'boolean',
            'order' => 'integer',
        ]);
        
        if ($request->hasFile('icon')) {
            if ($service->icon) {
                Storage::disk('public')->delete($service->icon);
            }
            $validated['icon'] = $request->file('icon')->store('services/icons', 'public');
        }
        
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $validated['image'] = $request->file('image')->store('services/images', 'public');
        }
        
        $validated['is_active'] = $request->has('is_active');
        
        $service->update($validated);
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil diperbarui.');
    }
    
    public function destroy(Service $service)
    {
        if ($service->icon) {
            Storage::disk('public')->delete($service->icon);
        }
        
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        
        $service->delete();
        
        return redirect()->route('admin.services.index')->with('success', 'Layanan berhasil dihapus.');
    }
}