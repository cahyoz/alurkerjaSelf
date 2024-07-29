@extends('layouts.app')

@section('content')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
</header>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <a href=""
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
            Add Project
        </a>
        <h2 class=" text-4xl font-extrabold text-blue-600 text-left mt-8 mb-4">Project List</h2>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right">
                <thead class="text-xs">
                    <tr>
                        <th scope="col" class="px-6 py-3">Project Name</th>
                        <th scope="col" class="px-6 py-3">Date Modified</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $project->name }}</td>
                        <td class="px-6 py-4">{{ $project->updated_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</main>
@endsection