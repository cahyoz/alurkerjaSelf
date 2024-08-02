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

        $modeler = Modeler::where('project_id', $project->id)->first();
        $diagramXml = $modeler ? $modeler->bpmn : '';

        return view('project.modeler', compact('project', 'diagramXml'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'modeler' => 'required|string',
            'project_id' => 'required|integer|exists:projects,id',
        ]);

        $modeler = Modeler::where('project_id', $request->input('project_id'))->first();

        if($modeler){
            $modeler->bpmn = $request->input('modeler');
            $modeler->save();
            $message = "Diagram updated successfully";
        } else{
            $modeler = new Modeler();
            $modeler->bpmn = $request->input('modeler');
            $modeler->project_id = $request->input('project_id');
            $modeler->save();
            $message = "Diagram updated successfully";
        }

        return response()->json([
            'message' => $message,
            'diagram' => $modeler->bpmn
        ], 200);
    }
}