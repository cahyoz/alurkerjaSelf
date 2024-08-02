@extends('layouts.app')

@section('content')

<head>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/bpmn-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/diagram-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@17.9.0/dist/assets/bpmn-font/css/bpmn.css">

    <!-- modeler distro -->
    <script src="https://unpkg.com/bpmn-js@17.9.0/dist/bpmn-modeler.development.js"></script>

    <!-- needed for this example only -->
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">BPMN Modeler</h1>
    </div>
</header>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen ">
        <div id="canvas" class="w-[90%] h-[70vh] bg-white border border-gray-200"></div>
        <div class="flex flex-row space-x-4">
            <button id="download-button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Download Diagram</button>
            <button id="save-button" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Save Diagram</button>
            <button class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" id="import-button">Import
                Diagram</button>
            <input type="file" id="file-input" accept=".bpmn, .xml" style="display: none;">
            <input type="hidden" id="project-id" value="{{ $project->id }}">
        </div>
    </div>
    <div id="diagram-data" data-xml="{!! htmlspecialchars($diagramXml, ENT_QUOTES, 'UTF-8') !!}"></div>
    @vite('resources/js/bpmn.js')
</body>
@endsection