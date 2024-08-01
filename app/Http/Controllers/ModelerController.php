<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelerController extends Controller
{
    public function index()
    {
        return view('project.modeler');
    }
}