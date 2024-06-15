@extends('layouts.main')

@section('main')
<x-app-layout>
<br>
    <br>
    <div class="bg-white dark:text-gray-200 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only dark:text-gray-200">Movies</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                @each('movies.shared.card', $movies, 'movie')

            </div>
        </div>
    </div>

    </div>
</x-app-layout>
