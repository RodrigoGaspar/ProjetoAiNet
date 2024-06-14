@extends('layouts.main')

@section('header-title', 'Movies')

@section('main')
<div>
    <table class="table-auto ">
        <thead>
            <tr class="border-b-2 border-b-gray-400 dark:border-b-gray-500
            bg-gray-100 dark:bg-gray-100">
                <th>Title</th>
                <th>Genre</th>
                <th>Year</th>
                {{-- <th>poster</th> --}}
                <th>Synopsis</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movies as $movie) --}}
            <tr class="border-b border-b-gray-400 dark:border-b-gray-500">
                <td class="px-2 py-2 text-left">{{ $movie->title }}</td>
                <td class="px-2 py-2 text-left">{{ $movie->genre_code }}</td>
                <td class="px-2 py-2 text-left">{{ $movie->year }}</td>
                {{-- <td> --}}
                    {{--
                    <x-field.image name="{{ $movie->poster_filename }}" label="Photo" width="md" readonly
                        deleteTitle="Delete Photo" :deleteAllow="true" :imageUrl="photoFullUrl" />
                    {{-- {{ $movie->poster_filename }} --}}
                    {{--
                </td> --}}
                <td class="px-2 py-2 text-left">{{ $movie->synopsis }}</td>
                <td class="px-2 py-2 text-left"><a href="{{ $movie->trailer_url }}" target="new">Trailer</a></td>
                <td class="px-2 py-2 text-left">
                    <x-table.icon-show class="ps-3 px-0.5" href="{{ route('movies.show', ['movie' => $movie]) }}" />
                </td>
                {{-- <x-table.icon-show class="ps-3 px-0.5" href="{{ route('movies.show', ['movie' => $movie]) }}" /> --}}
                {{-- <td class="px-2 py-2 text-left"><a href="{{ route('movies.show', ['movie' => $movie]) }}">View</a></td> --}}
                <td class="px-2 py-2 text-left">
                    {{-- <a href="{{ route('movies.edit', ['movies' => $movie]) }}">
                        Update</a> --}}
                    <a>
                        Add</a>
                </td>

            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{-- {{ $movie->links() }} --}}
</div>
@endsection
