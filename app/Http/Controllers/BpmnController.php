<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BpmnController extends Controller
{
    public function index()
    {
        return view('project.bpmn');
    }
}