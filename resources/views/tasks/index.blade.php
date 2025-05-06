@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Tasks</h1>
        <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Task</a>
    </div>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
    @endif

    <div class="bg-white shadow rounded p-4">
        <table class="w-full text-left">
            <thead>
                <tr class="border-b">
                    <th class="py-2">Title</th>
                    <th class="py-2">Project</th>
                    <th class="py-2">Due Date</th>
                    <th class="py-2">Category</th>
                    <th class="py-2">Status</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="border-b">
                        <td class="py-2">{{ $task->title }}</td>
                        <td class="py-2">{{ $task->project->name ?? 'N/A' }}</td>
                        <td class="py-2">{{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}</td>
                        <td class="py-2">{{ $task->category }}</td>
                        <td class="py-2">{{ ucfirst($task->status ?? 'active') }}</td>
                        <td class="py-2">
                            <a href="{{ route('tasks.edit', $task) }}" class="text-black bg-green-500 rounded px-4 py-1.5 hover:underline">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this task?')" class="text-black bg-red-500 px-2 py-1 rounded hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="py-4 text-center">No tasks found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
