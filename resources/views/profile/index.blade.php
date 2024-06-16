@extends('layouts.main')
@if(auth()->check() && auth()->user()->type == 'A')
    <x-app-layout>
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4">
                <label for="typeFilter" class="block text-sm font-medium text-gray-700">Filter by type:</label>
                <select id="typeFilter"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">All types</option>
                    <option value="A">Admin</option>
                    <option value="E">Employee</option>
                    <option value="C">Customer</option>
                </select>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4" id="profileContainer">
                @foreach ($profiles as $profile)
                    <div class="profile-card bg-white dark:bg-gray-800 rounded-lg shadow-md p-4"
                        data-type="{{ $profile->type }}">
                        <a href="{{ route('profile.manage', $profile) }}">
                            <img src="../storage/photos/{{ $profile->photo_filename }}" class=" mb-3 rounded-md">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-200">{{ $profile->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const typeFilter = document.getElementById('typeFilter');
                const profileCards = document.querySelectorAll('.profile-card');

                typeFilter.addEventListener('change', function () {
                    const selectedType = this.value;

                    profileCards.forEach(card => {
                        const cardType = card.getAttribute('data-type');

                        if (selectedType === '' || selectedType === cardType) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>
    </x-app-layout>
@else
<p>You do not have permission to access this section.</p>
@endif