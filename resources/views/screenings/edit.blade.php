@extends('layouts.main')

@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg">
                <div class="p-6 sm:px-10 bg-white dark:bg-gray-800">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Edit Screening</h2>
                    </div>

                    @if ($errors->any())
                        <div class="mb-4">
                            <div class="font-medium text-red-600">
                                {{ __('Whoops! Something went wrong.') }}
                            </div>

                            <ul class="mt-3 list-disc list-inside text-sm text-red-600 dark:text-red-400">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('screening.update', $screening->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="theater_id"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Theater</label>
                                <select name="theater_id" id="theater_id"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                                    @for ($i = 1; $i <= 8; $i++)
                                        <option value="{{ $i }}" {{ old('theater_id', $screening->theater_id) == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <div>
                                <label for="date"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                                <div class="flex items-center">
                                    <input type="date" name="date" id="date"
                                        value="{{ old('date', \Illuminate\Support\Carbon::parse($screening->date)->format('Y-m-d')) }}"
                                        class="mt-1 block w-1/2 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300"
                                        min="{{ now()->format('Y-m-d') }}" max="{{ now()->addWeeks(3)->format('Y-m-d') }}">
                                </div>
                            </div>

                            <div>
                                <label for="start_time"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Time</label>
                                <input type="time" name="start_time" id="start_time"
                                    value="{{ old('start_time', $screening->start_time) }}"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm dark:bg-gray-700 dark:text-gray-300">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 dark:focus:ring-offset-gray-900">Update
                                Screening</button>
                            <a href="{{ route('screenings') }}"
                                class="ml-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md shadow-sm text-gray-700 bg-white hover:bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 dark:focus:ring-offset-gray-900">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif
