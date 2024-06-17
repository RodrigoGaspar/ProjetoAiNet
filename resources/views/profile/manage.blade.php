@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mt-5">

                <div class="flex flex-col items-center">
                    <h1 class="text-xl font-semibold text-gray-900 dark:text-gray-200 mb-2">{{ $profile->name }}</h1>
                    <div class="sm:w-1/3 mb-4 sm:mb-0 flex justify-center">
                        <img src="../../storage/photos/{{ $profile->photo_filename }}" alt="{{ $profile->name }}"
                            class="rounded-lg shadow-lg">
                    </div>
                    <div class="sm:w-2/3 sm:ml-4 mt-4 flex flex-col items-center">
                        <div class="flex items-center mb-2">
                            <span class="mr-2 text-gray-600 dark:text-gray-400">Email:</span>
                            <span
                                class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $profile->email }}</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="mr-2 text-gray-600 dark:text-gray-400">User:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                @if($profile->type === 'A')
                                    Admin
                                @elseif($profile->type === 'E')
                                    Employee
                                @elseif($profile->type === 'C')
                                    Customer
                                @endif
                            </span>
                        </div>
                        <div class="flex items-center mb-4">
                            <span class="mr-2 text-gray-600 dark:text-gray-400">State:</span>
                            <span class="text-lg font-semibold text-gray-900 dark:text-gray-200">
                                @if($profile->blocked === 1)
                                    Blocked
                                @else
                                    Not Blocked
                                @endif
                            </span>
                        </div>
                        <!-- Botão para mudar o estado de blocked -->
                        <div class="flex mb-4">
                            <form action="{{ route('profile.toggleBlocked', $profile->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">
                                    @if($profile->blocked === 1)
                                        Unblock
                                    @else
                                        Block
                                    @endif
                                </button>
                            </form>
                            <a href="{{ route('profile.change', $profile->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-400 text-black font-semibold py-2 px-4 rounded-lg mr-2">
                                Edit
                            </a>
                            <form action="{{ route('profile.delete', $profile->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')"
                                    class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg mr-2">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p class="text-center">You do not have permission to access this section.</p>
@endif
