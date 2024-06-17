@extends('layouts.main')

@section('main')
@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">

                    <div class="w-full max-w-4xl mx-auto bg-white p-5 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-center mb-5">Purchases Statistics 2023</h2>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Month</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Sales
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Revenue
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($purchases as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $row['Month'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $row['Sales'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $row['Revenue'] }}$</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="w-full max-w-4xl mx-auto bg-white p-5 rounded-lg shadow-md">
                        <h2 class="text-2xl font-semibold text-center mb-5">Screenings per Theater</h2>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Theater</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Screenings
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($sessions as $row)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $row['Theater'] }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $row['Screenings'] }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    </x-app-layout>
@else
    <p>You do not have permission to access this section.</p>
@endif