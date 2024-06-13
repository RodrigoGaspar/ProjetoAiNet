@extends('layouts.layout')

@section('content')

    <table>
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
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre_code }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{--
                        <x-field.image name="{{ $movie->poster_filename }}" label="Photo" width="md" readonly
                            deleteTitle="Delete Photo" :deleteAllow="true" :imageUrl="photoFullUrl" />
                         --}}
                        {{ $movie->poster_filename }}
                    </td>
                    <td>{{ $movie->synopsis }}</td>
                    <td><a href="{{ $movie->trailer_url }}" target="new">Trailer</a></td>
                    <td><a href="{{ route('movies.show', ['movie' => $movie]) }}">View</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection