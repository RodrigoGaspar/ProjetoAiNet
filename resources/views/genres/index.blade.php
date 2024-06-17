@extends('layouts.main')
@if(auth()->check() && auth()->user()->type == 'A')
    @section('main')
    <x-app-layout>
        <br>
        <br>
        <div
            class="bg-white dark:text-gray-200 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 rounded-md">

            <div class="mx-auto max-w-2xl px-4 sm:px-6 sm:py-10 lg:max-w-7xl lg:px-8">

                <a href="{{ route('genres.create') }}"
                    class="inline-block px-6 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-700">
                    Add Genre
                </a>

                <table class="table-auto w-full">
                    <thead>
                        <tr class="border-b-2 border-b-gray-400">
                            <th class="px-2 py-2 text-center">Code</th>
                            <th class="px-2 py-2 text-center">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($genres as $genre)
                            <tr class="border-b border-b-gray-400 dark:border-b-gray-500">
                                <td class="px-2 py-2 text-center">{{ $genre->code }}</td>
                                <td class="px-2 py-2 text-center">{{ $genre->name }}</td>
                                <td class="px-2 py-2 text-center">
                                    <a href="{{ route('genres.edit', $genre->code) }}"
                                        class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-200"
                                        title="Edit">
                                        Edit
                                    </a>
                                    <form action="{{ route('genres.delete', $genre->code) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="ml-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200"
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this theater?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif