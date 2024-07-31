@extends('layouts.app')

@section('content')

<head>
    @vite('resources/js/app.js')
</head>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
</header>

<body>
    <button type="button"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">BPMN</button>
    <div id="app">
        <example-component>
        </example-component>
    </div>
</body>
@endsection