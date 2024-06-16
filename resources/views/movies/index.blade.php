@extends('layouts.main')
<x-app-layout>
    <br>
    <br>
    <div class="bg-white dark:text-gray-200 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex justify-between items-center mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <h1 class="text-2xl font-semibold">Lista de Filmes</h1>
            @if(auth()->check() && auth()->user()->type == 'A')
                <a href="{{ route('movies.create') }}" class="inline-block px-6 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                    Adicionar Filme
                </a>
            @endif
        </div>

        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">

                @each('movies.shared.card', $movies, 'movie')

            </div>
        </div>
        <div class="mb-5">
            {{ $movies->links() }}
        </div>
        
    </div>
</x-app-layout>
