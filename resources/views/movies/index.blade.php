<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr class="border-b-2 border-b-gray-400 dark:border-b-gray-500
            bg-gray-100 dark:bg-gray-100">
                <th>Title</th>
                <th>Genre</th>
                {{-- <th>poster</th> --}}
                <th>Synopsis</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->genre_code }}</td>
                <td>{{ $movie->year }}</td>
                <td>
                    <x-field.image
 name="{{ $movie->poster_filename }}"
 label="Photo"
 width="md"
 readonly
 deleteTitle="Delete Photo"
 :deleteAllow="true"
 :imageUrl="photoFullUrl"/>
                    {{-- {{ $movie->poster_filename }} --}}
                </td>
                <td>{{ $movie->synopsis }}</td>
                <td><a href="{{ $movie->trailer_url }}" target="new">Trailer</a></td>
                <td><a href="{{ route('movies.show', ['movie' => $movie]) }}">View</a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
</body>

<div class="mt-4">
    {{ $movies->links() }}
</div>
@endsection
