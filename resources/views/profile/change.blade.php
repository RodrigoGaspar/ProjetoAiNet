@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mt-5">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-8 text-center">Edit Profile:</h1>

                <form action="{{ route('profile.changed', $profile->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $profile->name }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $profile->email }}" class="form-input w-full">
                    </div>

                    <div class="mb-4">
                        <label for="type" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">User
                            Type:</label>
                        <select id="type" name="type" class="form-select w-full">
                            <option value="A" @if($profile->type === 'A') selected @endif>Admin</option>
                            <option value="E" @if($profile->type === 'E') selected @endif>Employee</option>
                            <option value="C" @if($profile->type === 'C') selected @endif>Customer</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                        Update Profile
                    </button>
                </form>
            </div>
        </div>
    </x-app-layout>
@else
    <p class="text-center">You do not have permission to access this section.</p>
@endif
