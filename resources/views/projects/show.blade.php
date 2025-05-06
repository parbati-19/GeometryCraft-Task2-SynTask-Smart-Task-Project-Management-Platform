
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 rounded-md shadow-md">
        <h1 class="text-3xl font-semibold mb-4 text-indigo-600">{{ $project->name }}</h1>

        <div class="mb-4">
            <strong>Description:</strong>
            <p class="text-gray-600">{{ $project->description ?? 'No description available.' }}</p>
        </div>

        <div class="mb-4">
            <strong>Status:</strong>
            <p class="text-gray-500">{{ $project->completion_status }}</p>
        </div>

        <div class="mb-4">
            <strong>Created At:</strong>
            <p class="text-gray-500">{{ $project->created_at->format('F j, Y') }}</p>
        </div>

        <div class="mb-4">
            <a href="{{ route('projects.edit', $project->id) }}" class="text-white bg-indigo-600 px-4 py-2 rounded hover:bg-indigo-800">Edit Project</a>
        </div>

        
    </div>
</div>
@endsection
