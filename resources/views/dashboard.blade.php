@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex bg-grey-100">

        <!-- Sidebar -->
        <div class=" flex flex-col items-center  w-64 bg-white-800 text-black shadow">
            <div class="flex items-center justify-center shadow w-64 h-18">
                <img src="{{asset('img/logo1.png')}}" alt="logo" class="w-18 h-auto mx-auto ">
                <div class="text-2xl font-bold ">SynTask</div>
                <hr>
            </div>


            <div class="flex flex-col items-center space-y-4 py-8">
                <a href="{{ route('dashboard') }}" class="block hover:bg-gray-700 p-2 rounded">Dashboard</a>
                <a href="{{ route('projects.index') }}" class="block hover:bg-gray-700 p-2 rounded">Projects</a>
                <a href="{{ route('tasks.index') }}" class="block hover:bg-gray-700 p-2 rounded">Tasks</a>
                <a href="{{ route('profile.edit') }}" class="block hover:bg-gray-700 p-2 rounded">Profile</a>
            </div>

            <div class="mt-5 flex items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="w-full text-left hover:bg-purple-600 p-2 rounded ">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <div class="bg-white shadow p-4 flex justify-between items-center">
                <div>
                    <h1 class="text-xl font-semibold text-gray-800">Welcome, {{ Auth::user()->firstname }} 👋</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname}}+{{ Auth::user()->lastname}}"
                        class="bg-black w-10 h-10 rounded-full" alt="User Avatar">
                </div>
            </div>

            <!-- Content area -->
            <div class="my-8 mx-8">
                <h2 class="text-2xl font-semibold mb-6 text-indigo-600 ">Active Projects</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto">
                    @foreach($projects as $project)
                        <div class="bg-white rounded-md shadow-md p-4">
                            <h3 class="text-xl mb-4 font-semibold">{{ $project->name }}</h3>
                            <p class="text-black mb-2 font-mono">{{ $project->description }}</p>
                            <p class="text-black">Status: <span class="font-semibold">{{ $project->status }}</span></p>
                            @php
                                $statusPercent = match ($project->completion_status) {
                                    'Active' => 0,
                                    'In Progress' => 50,
                                    'Complete' => 100,
                                    default => 0,
                                };
                            @endphp

                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-2 mt-2">
                                <div class="bg-blue-500 h-3 rounded-full" style="width: {{ $statusPercent }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500 mb-4">{{ $statusPercent }}% complete</p>
                            <a href="{{ route('projects.show', $project->id) }}"
                                class="text-white py-2 px-2 mb-2 border rounded-full bg-gray-600 hover:bg-gray-700">View
                                Project</a>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="my-8 mx-8">
                <h2 class="text-2xl font-semibold mb-6 text-indigo-600 ">Recent tasks</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mx-auto">
                    @foreach ($tasks as $task)
                        <div class="bg-white p-4 shadow rounded mb-4">
                            <h2 class="text-xl font-semibold">{{ $task->title }}</h2>

                            @php
                                // Map ENUM status to a percentage
                                $statusPercent = match ($task->status) {
                                    'Not Started' => 0,
                                    'Active' => 30,
                                    'In Progress' => 65,
                                    'Complete' => 100,
                                    default => 0,
                                };

                                // Choose colors for progress
                                $color = match (true) {
                                    $statusPercent <= 30 => 'bg-red-500',
                                    $statusPercent <= 70 => 'bg-yellow-400',
                                    default => 'bg-green-500',
                                };
                            @endphp

                            <!-- Progress Bar -->
                            <div class="w-full bg-gray-200 rounded-full h-3 mb-2">
                                <div class="{{ $color }} h-3 rounded-full" style="width: {{ $statusPercent }}%"></div>
                            </div>
                            <p class="text-sm text-gray-500">{{ $statusPercent }}% complete -
                                <strong>{{ $task->status }}</strong>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- <div>
            <form action="" method="post">
                <button>Logout</button>
            </form>
        </div> --}}

    </div>
@endsection