@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'C')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800 rounded-md">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Choose Your Seats</h2>
                    </div>

                    <div class="mb-4">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            Movie: {{ $screening->movie->title }}
                        </p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            Theater: {{ $screening->theater_id }}
                        </p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            Date: {{ $screening->date }}
                        </p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">
                            Start Time: {{ $screening->start_time }}
                        </p>
                    </div>

                    <div class="mb-6 text-center">
                        <div class="inline-block w-3/4 mb-24 mt-4 py-2 bg-gray-300 dark:bg-gray-700 rounded-md text-gray-900 dark:text-white font-semibold">
                            SCREEN
                        </div>
                    </div>
                    <form action="{{ route('ticket.purchase', $screening->id) }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-10 gap-y-2">
                            @foreach ($seats as $seat)
                                <div class="text-center">
                                    <input type="checkbox" name="seats[]" value="{{ $seat->id }}" id="seat-{{ $seat->id }}">
                                    <label for="seat-{{ $seat->id }}" class="text-gray-900 dark:text-white block">
                                        {{ $seat->number }}
                                    </label>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $seat->row }}{{ $seat->seat_number }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                                Purchase Ticket
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
@endif
