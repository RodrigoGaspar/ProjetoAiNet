
@extends('layouts.main')

@section('header-title', 'Movies')

@section('main')
<div >
    <table class="table-auto ">
        <thead>
            <tr>
                <th>Title</th>
                <th>genre_code</th>
                <th>year</th>
                <th>poster</th>
                <th>synopsis</th>
                <th>trailer</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)

            <tr class="border-b border-b-gray-400 dark:border-b-gray-500">
                <td class="px-2 py-2 text-left">{{ $movie->title }}</td>
                <td class="px-2 py-2 text-left">{{ $movie->genre_code }}</td>
                {{-- <td> --}}
                    {{--
                    <x-field.image name="{{ $movie->poster_filename }}" label="Photo" width="md" readonly
                        deleteTitle="Delete Photo" :deleteAllow="true" :imageUrl="photoFullUrl" />
                    {{-- {{ $movie->poster_filename }} --}}
                    {{--
                </td> --}}
                <td class="px-2 py-2 text-left">{{ $movie->synopsis }}</td>
                <td class="px-2 py-2 text-left"><a href="{{ route('movies.show', ['movie' => $movie]) }}">View</a></td>
                <td class="px-2 py-2 text-left">
                    {{-- <a href="{{ route('movies.edit', ['movies' => $movie]) }}">
                    Update</a> --}}
                    <a >
                        Add</a>
                    </td>


            </tr>
            @endforeach
        </tbody>
    </table>

</div>

<div class="mt-4">
    {{ $movies->links() }}
</div>
@endsection
