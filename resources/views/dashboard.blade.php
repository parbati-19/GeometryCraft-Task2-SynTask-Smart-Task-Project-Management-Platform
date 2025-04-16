@extends('layouts.app')
@section('content')

    <div class="flex flex-col items-center justify-center max-h-fullscreen max-w-fullscreen">
        @if (!session('success'))
            <p>{{ session('success') }}</p>
        @endif
        <div class="flex h-screen">
            <!-- Sidebar -->
            <div class="w-64 bg-white-500 shadow-md p-5">
                <div class="flex flex-rol items-start justify-between space-x-1 ">
                  
                        <img class="h-10 w-10" src="{{asset('img/logo1.png')}}" alt="logo">
                    
                    <h2 class="text-xl font-bold text-purple-600 mb-8">SynTask</h2>
                  
                </div>
                <nav class="space-y-4">
                    <a href="#" class="block text-gray-700 font-medium hover:text-purple-600">Dashboard</a>
                    <a href="#" class="block text-gray-700 hover:text-purple-600">Tasks</a>
                    <a href="#" class="block text-gray-700 hover:text-purple-600">Projects</a>
                    <a href="#" class="block text-gray-700 hover:text-purple-600">Tags</a>
                    <div class="border-t my-4"></div>
                    <a href="#" class="block text-gray-700 hover:text-purple-600">Settings</a>
                    <a href="#" class="block text-gray-700 hover:text-purple-600">Profile</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="flex-1 p-8 overflow-auto">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold">Dashboard</h1>
                        <p class="text-sm text-gray-500">Welcome back, {{auth()->user()->firstname}}!</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-purple-600 text-white px-4 py-2 rounded-lg">+ New Task</button>
                        <button class="bg-indigo-100 text-purple-600 px-4 py-2 rounded-lg">+ New Project</button>
                    </div>
                </div>

                <!-- Search & Filters -->
                <div class="flex items-center gap-4 mb-8">
                    <input type="text" placeholder="Search tasks and projects..."
                        class="flex-1 border border-gray-300 rounded-lg px-4 py-2">
                    <select class="border border-gray-300 rounded-lg px-2 py-2 text-sm">
                        <option>Priority</option>
                    </select>
                    <select class="border border-gray-300 rounded-lg px-2 py-2 text-sm">
                        <option>Status</option>
                    </select>
                    <select class="border border-gray-300 rounded-lg px-2 py-2 text-sm">
                        <option>Date</option>
                    </select>
                </div>

                <!-- Recent Tasks -->
                <div class="mb-10">
                    <h2 class="text-lg font-medium mb-4">Recent Tasks</h2>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-4 rounded-lg border-l-4 border-red-500">
                            <div class="flex justify-between">
                                <h3 class="font-semibold">Update API Documentation</h3>
                                <span class="text-xs text-white bg-red-500 px-2 py-1 rounded-full">Urgent</span>
                            </div>
                            <p class="text-sm text-gray-500">📅 Due Today</p>
                        </div>
                        <div class="bg-white p-4 rounded-lg border-l-4 border-yellow-400">
                            <div class="flex justify-between">
                                <h3 class="font-semibold">Design System Updates</h3>
                                <span class="text-xs text-white bg-yellow-400 px-2 py-1 rounded-full">In Progress</span>
                            </div>
                            <p class="text-sm text-gray-500">📅 Due in 3 days</p>
                        </div>
                    </div>
                </div>

                <!-- Active Projects -->
                <div>
                    <h2 class="text-lg font-medium mb-4">Active Projects</h2>
                    <div class="grid grid-cols-3 gap-6">
                        <!-- Project Card -->
                        <div class="bg-white p-4 rounded-lg shadow-sm">
                            <div class="flex justify-between items-center">
                                <h3 class="font-semibold text-sm">Mobile App Redesign</h3>
                                <span class="text-xs bg-indigo-200 text-indigo-800 px-2 py-1 rounded-full">In
                                    Progress</span>
                            </div>
                            <p class="text-sm text-gray-500 mt-2">Redesigning the mobile app interface...</p>
                            <div class="mt-4">
                                <div class="text-xs text-gray-400 mb-1">Progress</div>
                                <div class="w-full bg-gray-200 h-2 rounded">
                                    <div class="bg-purple-600 h-2 rounded" style="width: 75%;"></div>
                                </div>
                                <div class="text-right text-xs text-gray-400 mt-1">Due Mar 25, 2025</div>
                            </div>
                        </div>

                        <!-- Add two more project cards similarly -->
                    </div>
                </div>

            </div>
        </div>

        
    </div>
@endsection