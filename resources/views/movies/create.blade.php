@extends('layouts.main')
@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="max-w-2xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-bold mb-8 text-gray-900 dark:text-gray-200">New Movie</h2>
            <form method="POST" action="/movies" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                @csrf
                @php
                    $inputClasses = "mt-1 block w-full p-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500";
                    $labelClasses = "block text-sm font-medium text-gray-700 dark:text-gray-300";
                @endphp
                <div class="mb-4">
                    <label for="inputtitle" class="{{ $labelClasses }}">Title</label>
                    <input type="text" name="title" id="inputtitle"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600">
                </div>
                <div class="mb-4">
                    <label for="inputgenre" class="{{ $labelClasses }}">Genre</label>
                    <select name="genre_code" id="inputgenre"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600" required>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->code }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="inputyear" class="{{ $labelClasses }}">Year</label>
                    <input type="text" name="year" id="inputyear"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600">
                </div>
                <div class="mb-4">
                    <label for="inputposter_filename" class="{{ $labelClasses }}">Poster Filename</label>
                    <input type="text" name="poster_filename" id="inputposter_filename"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600">
                </div>
                <div class="mb-4">
                    <label for="inputsynopsis" class="{{ $labelClasses }}">Synopsis</label>
                    <textarea type="text" name="synopsis" id="inputsynopsis"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600"></textarea>
                </div>
                <div class="mb-4">
                    <label for="inputtrailer_url" class="{{ $labelClasses }}">Trailer URL</label>
                    <input name="trailer_url" id="inputtrailer_url" rows="4"
                        class="{{ $inputClasses }} border-gray-300 dark:border-gray-600">
                </div>
                <div class="flex justify-between">
                    <a href="{{ route('movies') }}"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        Cancel
                    </a>
                    <button type="submit" name="ok"
                        class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Save New Movie
                    </button>
                </div>
            </form>
        </div>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif