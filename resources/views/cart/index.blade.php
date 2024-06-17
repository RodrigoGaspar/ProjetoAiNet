@extends('layouts.main');

@if(!auth()->check() || (auth()->check() && auth()->user()->type == 'C'))
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800 rounded-md">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Your Cart</h2>
                    </div>
                    <div class="mb-4">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Movie: {{ $screening->movie->title }}
                        </p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Theater: {{ $screening->theater_id }}
                        </p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Date: {{ $screening->date }}</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Start Time: {{ $screening->start_time }}</p>
                    </div>
                    <div class="mb-6">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Selected Seats:</h3>
                        <ul>
                            @foreach ($selectedSeats as $seatId)
                                @php
                                    $seat = \App\Models\Seat::find($seatId);
                                @endphp
                                <li class="text-lg text-gray-900 dark:text-white">{{ $seat->row }}{{ $seat->seat_number }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mt-6">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">
                            Proceed to Payment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

@else
    <p>You do not have access to this page.</p>
@endif
