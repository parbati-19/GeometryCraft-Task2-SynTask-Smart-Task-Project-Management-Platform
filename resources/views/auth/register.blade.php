@extends ('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">

        <div class="flex w-full max-w-6xl bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Left Image Side -->
            <div class="flex flex-col items-start justify-center p-10 w-1/2 bg-cover bg-center relative bg-gradient-to-br from-indigo-600 to-purple-600 text-white">
               
                <h2 class="text-4xl font-bold mb-2">SynTask</h2>
                <p class="text-sm mb-8">Smart Task and Project Management Platform</p>

                <ul class="space-y-3 text-sm">
                    <li class="flex items-center"><span class="mr-2">✔</span> Advanced API Infrastructure</li>
                    <li class="flex items-center"><span class="mr-2">✔</span> User-friendly Interface</li>
                    <li class="flex items-center"><span class="mr-2">✔</span> Powerful Integrations</li>
                </ul>
                <img src="/img/signup-illustration.png" alt="Illustration" class="mt-10 w-80 rounded-lg shadow-md" />
            </div>

            <!-- Right Form Side (Centered Login) -->
            <div class="w-1/2 p-8 flex items-center justify-center">
                <div class="w-full max-w-md">
                    <div class="flex flex-col items-center justify-center">
                        <h2 class="text-2xl font-bold text-gray-800 mb-1">Create your account</h2>
                        <p class="text-gray-600 mb-6">Start managing your tasks efficiently</p>
                    </div>

                    <form action="{{route('register.submit')}}" method="POST" class="space-y-1">
                        @csrf
                        <div class="flex space-x-4">
                            <div class="w-1/2">
                                <label class="text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="firstname"
                                    class="w-full mt-1 px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500 outline-none"
                                    required />
                            </div>
                            <div class="w-1/2">
                                <label class="text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="lastname"
                                    class="w-full mt-1 px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500 outline-none"
                                    required />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email address</label>
                            <input type="email" name="email"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-purple-500 outline-none" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password"
                                class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-purple-500 outline-none" />
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-700">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="w-full mt-1 px-4 py-2 border rounded-md focus:ring-2 focus:ring-indigo-500 outline-none"
                                required />
                        </div>
    
                        <button type="submit"
                            class="w-1/2 bg-purple-600 hover:bg-purple-700 text-white font-medium mt-3 px-2 py-2 rounded-md transition">
                            Sign Up
                        </button>
                    </form>

                    <div class="my-4 text-center text-gray-500">or continue with</div>

                    <div class="flex space-x-4">
                        <button
                            class="flex-1 flex items-center justify-center border rounded-md py-2 text-sm hover:bg-gray-100">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google"
                                class="w-5 h-5 mr-2" />
                            Google
                        </button>
                        <button
                            class="flex-1 flex items-center justify-center border rounded-md py-2 text-sm hover:bg-gray-100">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 0C5.37 0 0 5.37 0 12c0 5.3 3.438 9.8 8.207 11.387.6.113.793-.262.793-.583 0-.287-.01-1.046-.016-2.053-3.338.724-4.042-1.612-4.042-1.612-.546-1.387-1.333-1.756-1.333-1.756-1.09-.745.083-.73.083-.73 1.205.086 1.84 1.238 1.84 1.238 1.07 1.832 2.807 1.302 3.492.996.108-.775.42-1.302.763-1.6-2.665-.3-5.467-1.334-5.467-5.932 0-1.31.467-2.38 1.235-3.22-.124-.303-.536-1.523.117-3.176 0 0 1.008-.322 3.3 1.23.96-.267 1.986-.4 3.006-.404 1.02.004 2.047.137 3.01.404 2.29-1.552 3.296-1.23 3.296-1.23.655 1.653.243 2.873.12 3.176.77.84 1.232 1.91 1.232 3.22 0 4.61-2.807 5.628-5.48 5.922.432.373.816 1.102.816 2.222 0 1.604-.015 2.898-.015 3.293 0 .324.19.7.8.58C20.565 21.796 24 17.297 24 12c0-6.63-5.37-12-12-12z">
                                </path>
                            </svg> GitHub
                        </button>
                    </div>

                    <p class="text-sm text-center mt-6 text-gray-600">
                        Already have an account?
                        <a href="{{route('login')}}" class="text-purple-600 hover:underline">Login</a>
                    </p>
                </div>
            </div>
        </div>

@endsection