<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::where('is_featured', true)
            ->orderBy('completion_date', 'desc')
            ->take(3)
            ->get();
            
        $services = Service::where('is_active', true)
            ->orderBy('order')
            ->take(4)
            ->get();
            
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();
            
        return view('home', compact('featuredProjects', 'services', 'teamMembers'));
    }
}