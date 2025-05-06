@extends('layouts.app')
@section('content')

    <div class="min-h-screen flex items-center justify-center bg-gray-100">


        <div class="flex w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Left Image Side -->
            <div class="w-1/2 bg-cover bg-center relative" style="background-image: url('{{ asset('img/lp.webp') }}')">
                <div
                    class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white px-8">
                    <h1 class="text-3xl font-bold mb-2">Welcome to <span class="text-purple-400">SynTask</span></h1>
                    <p class="text-lg">Manage your tasks and projects efficiently</p>
                </div>
            </div>

            <!-- Right Form Side (Centered Login) -->
            <div class="w-1/2 p-10 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <h2 class="text-2xl font-bold text-gray-800 mb-1">Sign in to SynTask</h2>
                    <p class="text-gray-600 mb-6">Start managing your tasks efficiently</p>

                    <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="email" name="email" placeholder="Enter your email"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-purple-500 outline-none"
                                required autofocus />
                            @error('email')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" placeholder="Enter your password"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-purple-500 outline-none"
                                required />
                            @error('password')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center text-sm">
                                <input type="checkbox" class="mr-2" name="remember" />
                                Remember me
                            </label>
                            <a href="#" class="text-sm text-purple-600 hover:underline">Forgot
                                your password?</a>
                        </div>

                        <button type="submit"
                            class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 rounded-md transition">
                            Sign in
                        </button>
                    </form>

                    <div class="my-6 text-center text-gray-500">or continue with</div>

                    <div class="flex space-x-4">
                        <a href="{{route('login.redirect', 'facebook')}}"
                            class="flex-1 flex items-center justify-center border rounded-md py-2 text-sm hover:bg-gray-100">
                            {{-- facebook Icon --}}
                            <svg  class="w-5 h-5 mr-2" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>Facebook-color</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0"> <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook"> </path> </g> </g> </g>
                                </svg>
                            Facebook
                        </a>

                        <a href="{{route('login.redirect','google')}}"
                            class="flex-1 flex items-center justify-center border rounded-md py-2 text-sm hover:bg-gray-100">
                            <!-- Google Icon -->
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Facebook"
                                class="w-5 h-5 mr-2" />
                            Facebook
                        </a>

                        {{-- <a
                            class="flex-1 flex items-center justify-center border rounded-md py-2 text-sm
                            hover:bg-gray-100">
                            <!-- GitHub Icon (inline SVG for reliability) -->
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.207 11.387.6.113.793-.262.793-.583 0-.287-.01-1.046-.016-2.053-3.338.724-4.042-1.612-4.042-1.612-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.086 1.84 1.238 1.84 1.238 1.07 1.832 2.807 1.302 3.492.996.108-.775.42-1.302.763-1.6-2.665-.3-5.467-1.334-5.467-5.932 0-1.31.467-2.38 1.235-3.22-.124-.303-.536-1.523.117-3.176 0 0 1.008-.322 3.3 1.23.96-.267 1.986-.4 3.006-.404 1.02.004 2.047.137 3.01.404 2.29-1.552 3.296-1.23 3.296-1.23.655 1.653.243 2.873.12 3.176.77.84 1.232 1.91 1.232 3.22 0 4.61-2.807 5.628-5.48 5.922.432.373.816 1.102.816 2.222 0 1.604-.015 2.898-.015 3.293 0 .324.19.7.8.58C20.565 21.796 24 17.297 24 12c0-6.63-5.37-12-12-12z">
                                </path>
                            </svg>
                            GitHub
                        </a> --}}
                    </div>

                    <p class="text-sm text-center mt-6 text-gray-600">
                        Don’t have an account?
                        <a href="{{ route('register') }}" class="text-purple-600 hover:underline">Register now</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection