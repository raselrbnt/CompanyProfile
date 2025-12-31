<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $projectsCount = Project::count();
        $teamMembersCount = TeamMember::count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
        
        $latestProjects = Project::latest()->limit(5)->get();
        $latestMessages = ContactMessage::latest()->limit(5)->get();
        
        return view('admin.dashboard', compact(
            'servicesCount',
            'projectsCount',
            'teamMembersCount',
            'unreadMessagesCount',
            'latestProjects',
            'latestMessages'
        ));
    }
}