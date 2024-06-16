@extends('layouts.main')

<x-app-layout>
    <br>
    <br>
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

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                        <a href="#" title=""
                            class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            role="button">
                            <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                            Buy ticket
                        </a>

                        <a href="{{ $movie->trailer_url }}" target="_blank" title=""
                            class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                            role="button">
                            Watch Trailer
                        </a>
                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <p class="mb-6 text-gray-500 dark:text-gray-400">
                        {{ $movie->synopsis }}
                    </p>


                </div>
            </div>
        </div>
    </section>

    <div class="mt-4">
        {{-- {{ $movie->links() }} --}}
    </div>

    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased dark:text-white">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
            <table class="table-auto w-full">
                <thead>
                    <tr class="border-b-2 border-b-gray-400">
                        <th>Theater</th>
                        <th>Date</th>
                        <th>Start Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($screenings as $screening)
                        <tr class="border-b border-b-gray-400 dark:border-b-gray-500">
                            <td class="px-2 py-2 text-centrer">{{ $screening->theater_id }}</td>
                            <td class="px-2 py-2 text-left">{{ $screening->date }}</td>
                            <td class="px-2 py-2 text-left">{{ $screening->start_time }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>