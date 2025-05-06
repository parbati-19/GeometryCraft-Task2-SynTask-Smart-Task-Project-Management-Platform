@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-xl mx-auto p-6 bg-white rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Edit Project</h2>

            <form action="{{ route('projects.update', $project) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Project Name</label>
                    <input type="text" name="name" value="{{ old('name', $project->name) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2"
                        rows="3">{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Completion Status</label>
                    <select name="completion_status" class="w-full border rounded px-3 py-2">
                        <option value="Active" {{ $project->completion_status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="In Progress" {{ $project->completion_status == 'In Progress' ? 'selected' : '' }}>In
                            Progress</option>
                        <option value="Complete" {{ $project->completion_status == 'Complete' ? 'selected' : '' }}>Complete
                        </option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </form>
        </div>
    </div>
@endsection