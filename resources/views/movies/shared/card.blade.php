<a href="{{ route('movies.show', ['movie' => $movie]) }}" class="group">
    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
        <img src="storage/posters/{{ $movie->poster_filename }}"
            alt="poster"
            class="h-full w-full object-cover object-center group-hover:opacity-75">
    </div>
    <h3 class="mt-4 text-sm text-gray-700 dark:text-gray-200">{{ $movie->year }}</h3>
    <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-200">{{ $movie->title }}</p>
</a>