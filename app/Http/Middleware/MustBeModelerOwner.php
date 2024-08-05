<?php

namespace App\Http\Middleware;

use App\Models\Modeler;
use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeModelerOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('modeler.store') && $request->isMethod('post')) {
            return $next($request); // Skip this middleware for POST requests to /modelers
        }

        // Get the project_id from the route parameter
        $projectId = $request->route('project_id');

        // If no project_id is found, skip this middleware
        if (!$projectId) {
            return $next($request);
        }

        // Retrieve the associated project
        $project = Project::find($projectId);

        if ($project) {
            // Ensure the user is authenticated and owns the project
            if ($request->user() && $project->user_id != $request->user()->id) {
                abort(403, 'Unauthorized access to project.');
            }

            // Check if the modeler data exists for the given project_id
            $modeler = Modeler::where('project_id', $projectId)->first();

            // You can add additional logic here if you need to handle the modeler data specifically
        } else {
            abort(404, 'Project not found.');
        }


        return $next($request);
    }
}