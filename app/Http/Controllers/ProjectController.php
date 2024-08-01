<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
{
    $projects = Project::all();
    return view('dashboard.dashboard', compact('projects'));
}

public function store(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string|max:255', // Make description optional if needed
    ]);

    // Create the project
    Project::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'user_id' => auth()->id()
    ]);

    // Redirect or return response as needed
    return redirect()->route('dashboard')->with('success', 'Project created successfully!');


}

    public function show(Project $project)
    {
        
        return view('project.projectDetail', compact('project'));
    }

public function destroy(Project $project)
{
    $project->delete();
    return redirect()->route('dashboard')->with('success', 'Project deleted successfully.');
}

}