@extends('layouts.app')

@section('content')

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Dashboard</h1>
    </div>
</header>
<main>
    @if (session('success'))
    <div id='alert' lass="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProjectModalLabel">Add New Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('dashboard') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Project</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="text-4xl font-extrabold text-blue-600 text-left mt-8 mb-4">Project List</h2>
        <button type="button"
            class="focus:outline-none text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900"
            data-bs-toggle="modal" data-bs-target="#addProjectModal">
            Add Project
        </button>
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
                    <tr class="bg-white border-b cursor-pointer transition-transform transform hover:scale-95 hover:shadow-lg hover:bg-gray-100"
                        onclick="window.location=' {{ route('projects.show', $project) }}'">
                        <td class="px-6 py-4">{{ $project->name }}</td>
                        <td class="px-6 py-4">{{ $project->updated_at->format('Y-m-d H:i:s') }}</td>
                        <td class="px-6 py-4 text-right">
                            <!-- Delete Icon -->
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700"
                                    onclick="event.stopPropagation()">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertElement = document.getElementById('alert');
        if (alertElement) {
            setTimeout(function() {
                alertElement.style.opacity = 0;
                alertElement.style.transition = 'opacity 0.5s ease-out';
            }, 2000);
        }
    });
    </script>
</main>
@endsection