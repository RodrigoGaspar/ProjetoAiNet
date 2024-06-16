@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mt-5">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-200 mb-8">Profile Details:</h1>

                <div class="flex flex-col sm:flex-row items-center">
                    <div class="sm:w-1/3 mb-4 sm:mb-0">
                        <img src="../../storage/photos/{{ $profile->photo_filename }}" alt="{{ $profile->name }}"
                            class="rounded-lg shadow-lg">
                    </div>
                    <div class="sm:w-2/3 sm:ml-4">
                        <p class="text-xl font-semibold text-gray-900 dark:text-gray-200 mb-2">{{ $profile->name }}</p>
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
                        @if($profile->id !== auth()->id())
                            <form action="{{ route('profile.toggleBlocked', $profile->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg">
                                    @if($profile->blocked === 1)
                                        Desbloquear
                                    @else
                                        Bloquear
                                    @endif
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif