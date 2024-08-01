<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ModelerController extends Controller
{
    public function index($id)
    {
        $project = Project::findOrFail($id);

        return view('project.modeler', compact('project'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'bpmn' => 'required|string',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Save the BPMN data to the modeler table
        $modeler = Modeler::create([
            'bpmn' => $request->input('bpmn'),
        ]);

        // Associate the modeler with the project
        $project = Project::find($request->input('project_id'));
        $project->modeler_id = $modeler->id;
        $project->save();

        return response()->json([
            'message' => 'Diagram saved successfully!',
            'modeler_id' => $modeler->id,
        ]);
    }
}