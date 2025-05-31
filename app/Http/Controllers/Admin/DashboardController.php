<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $servicesCount = Service::count();
        $projectsCount = Project::count();
        $teamMembersCount = TeamMember::count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
        
        $latestProjects = Project::orderBy('created_at', 'desc')->take(5)->get();
        $latestMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();
        
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