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
            <tr>
                <th>Title</th>
                <th>genre_code</th>
                <th>year</th>
                <th>poster</th>
                <th>synopsis</th>
                <th>trailer</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($movies as $movie) --}}
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->genre_code }}</td>
                    <td>{{ $movie->year }}</td>
                    <td>{{ $movie->poster_filename }}</td>
                    <td>{{ $movie->synopsis }}</td>
                    <td><a href="{{ $movie->trailer_url }}" target="new">Trailer</a></td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>

</body>

</html>
