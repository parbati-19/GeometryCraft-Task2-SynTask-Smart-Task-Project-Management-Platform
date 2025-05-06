<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('project')
            ->whereHas('project', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'category' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string|in:Not-Started,Active,In_progress,Complete',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'category' => $request->category,
            'project_id' => $request->project_id,
            'status' => $request->status,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully!');
    }



    public function edit(Task $task)
    {
        $projects = Project::where('user_id', Auth::user()->id)->get();

        return view('tasks.edit', compact('task', 'projects'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'category' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'status' => 'required|string|required|string|in:Not-Started,Active,In_progress,Complete',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }

    public function destroy(Task $task)
    {

        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted!');
    }
}
