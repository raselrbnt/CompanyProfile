<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('order')->paginate(10);
        
        return view('admin.team.index', compact('members'));
    }
    
    public function create()
    {
        return view('admin.team.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }
        
        // Handle checkbox - if checked, request will have 'is_active', if not, it won't
        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        TeamMember::create($validated);
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil ditambahkan.');
    }
    
    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }
    
    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'order' => 'nullable|integer',
        ]);
        
        if ($request->hasFile('photo')) {
            if ($team->photo) {
                Storage::disk('public')->delete($team->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }
        
        // Handle checkbox - if checked, request will have 'is_active', if not, it won't
        $validated['is_active'] = $request->has('is_active') ? true : false;
        
        $team->update($validated);
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil diperbarui.');
    }
    
    public function destroy(TeamMember $team)
    {
        if ($team->photo) {
            Storage::disk('public')->delete($team->photo);
        }
        
        $team->delete();
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil dihapus.');
    }
}