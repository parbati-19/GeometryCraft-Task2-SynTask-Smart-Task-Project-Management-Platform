@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6 bg-white">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Profile</h2>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
                <input type="text" name="firstname" id="firstname" value="{{ old('firstname', auth()->user()->firstname) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
            </div>

            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="{{ old('lastname', auth()->user()->lastname) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
            </div>

            <div class="md:col-span-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-indigo-200" required>
            </div>
        </div>

        <div>
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Profile Photo (optional)</label>
            <input type="file" name="profile_photo" id="profile_photo"
                class="mt-1 block w-full border border-gray-300 rounded-md p-2">
        </div>

        <div class="border-t pt-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Change Password</h3>

            <div >
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
        </div>

        <div>
            <button type="submit"
                class="inline-block px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
