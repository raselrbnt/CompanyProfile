<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('completion_date', 'desc')
            ->paginate(9);
            
        return view('projects.index', compact('projects'));
    }
    
    public function show($id)
    {
        $project = Project::with('images')->findOrFail($id);
        
        return view('projects.show', compact('project'));
    }
}