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
</head>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
</header>

<body>

    <div class="flex flex-col items-left  p-10 min-h-screen ">
        <h2 class="text-4xl font-extrabold dark:text-black">{{$project->name}}</h2>
        <br>
        <p class="mb-3 text-gray-500 dark:text-gray-400">{{$project->description}}</p>
        <br>
        <button type="button" onclick="window.location='{{ route('modeler.show', ['project_id' => $project->id])) }}'"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Modeler</button>
    </div>
</body>
@endsection