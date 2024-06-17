@extends('layouts.main')

<x-app-layout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div
                    class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                    <img src="../storage/posters/{{ $movie->poster_filename }}" alt="poster"
                        class="h-full w-full object-cover object-center group-hover:opacity-75">
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex py-4">
                        <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                            {{ $movie->title }}
                        </p>
                    </div>

                    <p class="text-xl font-semibold text-gray-900 dark:text-white py-3">
                        {{ $movie->year }}
                    </p>

                    <p class="text-base text-gray-900 dark:text-white py-3">
                        {{ $movie->genre_code }}
                    </p>

                    <p class="mb-6 text-gray-500 dark:text-gray-400 mt-6">
                        {{ $movie->synopsis }}
                    </p>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <a href="{{ $movie->trailer_url }}" target="_blank" title=""
                            class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            role="button">
                            Watch Trailer
                        </a>
                        @if(auth()->check() && auth()->user()->type == 'A')
                            <form action="{{ route('movie.delete', $movie->id) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-red-600 bg-white border border-red-200 rounded-lg hover:bg-red-100 focus:outline-none focus:ring-4 focus:ring-red-100 dark:focus:ring-red-700 dark:bg-gray-800 dark:text-red-400 dark:border-red-600 dark:hover:text-white dark:hover:bg-gray-700"
                                    onclick="return confirm('Are you sure you want to delete this movie?')">
                                    Delete Movie
                                </button>
                            </form>
                        @endif
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    

                    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased dark:text-white">
                        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                            @if ($screenings->isEmpty())
                                <p class="text-center text-gray-500 dark:text-gray-400" style="font-weight: bold;">
                                    No Sessions Available
                                </p>
                            @else
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr class="border-b-2 border-b-gray-400">
                                            <th class="px-2 py-2 text-center">Theater</th>
                                            <th class="px-2 py-2 text-center">Date</th>
                                            <th class="px-2 py-2 text-center">Start Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($screenings as $screening)
                                            <tr class="border-b border-b-gray-400 dark:border-b-gray-500">
                                                <td class="px-2 py-2 text-center">{{ $screening->theater->name }}</td>
                                                <td class="px-2 py-2 text-center">{{ $screening->date }}</td>
                                                <td class="px-2 py-2 text-center">{{ $screening->start_time }}</td>
                                                @if(auth()->check() && auth()->user()->type == 'A')
                                                    <td class="px-2 py-2 text-center">
                                                        <a href="{{ route('screening.edit', $screening->id) }}"
                                                            class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-200"
                                                            title="Edit">
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('screening.destroy', $screening->id) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="ml-2 text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-200"
                                                                title="Delete"
                                                                onclick="return confirm('Are you sure you want to delete this screening?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                @elseif(!auth()->check() || (auth()->check() && auth()->user()->type == 'C'))
                                                    <td class="px-2 py-2 text-center">
                                                        <a href="{{ route('screening.buy', $screening->id) }}"
                                                            class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-200"
                                                            title="Buy Ticket">
                                                            Buy Ticket
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>