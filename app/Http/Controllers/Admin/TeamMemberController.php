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
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);
        
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }
        
        $validated['is_active'] = $request->has('is_active');
        
        TeamMember::create($validated);
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil ditambahkan.');
    }
    
    public function edit(TeamMember $member)
    {
        return view('admin.team.edit', compact('member'));
    }
    
    public function update(Request $request, TeamMember $member)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);
        
        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $validated['photo'] = $request->file('photo')->store('team', 'public');
        }
        
        $validated['is_active'] = $request->has('is_active');
        
        $member->update($validated);
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil diperbarui.');
    }
    
    public function destroy(TeamMember $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        
        $member->delete();
        
        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil dihapus.');
    }
}