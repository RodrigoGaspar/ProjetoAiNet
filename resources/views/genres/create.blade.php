@extends('layouts.main')
@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-8 text-gray-900 dark:text-gray-200">New Genre</h2>
            <form method="POST" action="{{ route('genres.store') }}" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                @csrf
                @php
                    $inputClasses = "mt-1 block w-full p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500";
                    $labelClasses = "block text-sm font-medium text-gray-700 dark:text-gray-300";
                @endphp

                <div class="mb-4">
                    <label for="inputname" class="{{ $labelClasses }}">Name</label>
                    <input type="text" name="name" id="inputname"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600">
                </div>

                <div class="mb-4">
                    <label for="inputcode" class="{{ $labelClasses }}">Code</label>
                    <input type="text" name="code" id="inputcode"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600" readonly>
                </div>
            
                <div class="flex justify-between">
                    <a href="{{ route('genres') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save New Genre
                    </button>
                </div>
            </form>
        </div>
        <script>
            document.getElementById('inputname').addEventListener('input', function() {
                document.getElementById('inputcode').value = this.value.toUpperCase();
            });
        </script>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif
