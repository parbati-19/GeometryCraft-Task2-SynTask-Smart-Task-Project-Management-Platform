@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-4xl mx-auto p-6 bg-white rounded shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">My Projects</h2>
                <a href="{{ route('projects.create') }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Project</a>
            </div>

            @if(session('success'))
                <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
            @endif

            @forelse($projects as $project)
                <div class="border p-4 mb-4 rounded shadow">
                    <h3 class="text-lg font-semibold">{{ $project->name }}</h3>
                    <p class="text-sm text-gray-600 mb-2">{{ $project->description }}</p>
                    <p class="text-sm">Status: <span class="font-semibold">{{ $project->completion_status }}</span></p>
                    <div class="mt-2 flex gap-2">
                        <a href="{{ route('projects.edit', $project) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST"
                            onsubmit="return confirm('Delete this project?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No projects found.</p>
            @endforelse
        </div>
    </div>

@endsection