<?php

namespace App\Http\Controllers;

use App\Models\Modeler;
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
        $request->validate([
            'modeler' => 'required|string',
            'project_id' => 'required|integer|exists:projects,id',
        ]);

        $modeler = new Modeler();
        $modeler->bpmn = $request->input('modeler');
        $modeler->project_id = $request->input('project_id');
        $modeler->save();

        return response()->json(['message' => 'Diagram saved successfully!'], 200);
    }
}