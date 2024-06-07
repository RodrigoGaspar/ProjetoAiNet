<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta genre="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie</title>
</head>

<body>
    <h2>New Movie</h2>
    <form method="POST" action="/movies">
        @csrf
        <div>
            <label for="inputtitle">Title</label>
            <input type="text" name="title" id="inputtitle">
        </div>
        <div>
            <label for="inputgenre">genre</label>
            <input type="text" name="genre_code" id="inputgenre">
        </div>
        <div>
            <label for="inputyear">year</label>
            <input type="text" name="year" id="inputyear">
        </div>
        <div>
            <label for="inputposter_filename">poster_filename</label>
            <input type="text" name="poster_filename" id="inputposter_filename">
        </div>
        <div>
            <label for="inputsynopsis">synopsis</label>
            <input type="text" name="synopsis" id="inputsynopsis">
        </div>
        <div>
            <label for="inputtrailer_url">trailer_url</label>
            <textarea name="trailer_url" id="inputtrailer_url" rows=10></textarea>
        </div>
        <div>
            <button type="submit" name="ok">Save new movie</button>
        </div>
    </form>
</body>

</html>