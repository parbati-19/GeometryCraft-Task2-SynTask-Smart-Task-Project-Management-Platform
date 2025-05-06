<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with active projects.
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        $tasks = Task::with('project')
            ->whereHas('project', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->latest()
            ->get();
        return view('dashboard', compact('projects', 'tasks')); // Pass the projects variable to the view
    }
}
