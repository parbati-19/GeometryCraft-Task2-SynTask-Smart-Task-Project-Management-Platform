@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4">
        <div class="w-full max-w-2xl mx-auto p-6 bg-white rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Create Task</h2>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Title</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}"
                        required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Description</label>
                    <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Due Date</label>
                    <input type="date" name="due_date" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Category</label>
                    <select name="category" class="w-full border rounded px-3 py-2" required>
                        <option value="Work">Work</option>
                        <option value="Personal">Personal</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1 font-medium">Project</label>
                    <select name="project_id" class="w-full border rounded px-3 py-2" required>
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" required class="mt-1 block w-full border rounded-md shadow-sm px-3 py-2">
                        <option value="Not-Started">Not Started</option>
                        <option value="Active">Active</option>
                        <option value="In_progress">In Progress</option>
                        <option value="Complete">Complete</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create
                    Task</button>
            </form>
        </div>
    </div>
@endsection