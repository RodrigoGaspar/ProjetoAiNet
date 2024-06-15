<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;


class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'genre_code',
        'year',
        'poster_filename',
        'synopsis',
        'trailer_url',
    ];

    protected $primaryKey = 'id';

    public function genre() : HasOne
    {
        return $this->hasOne(Genre::class,'genre_code','code');
    }

    public function getImageExistsAttribute()
    {
        return Storage::exists("public/posters/{$this->fileName}");
    }

    public function getImageUrlAttribute()
    {
        if ($this->imageExists) {
            return asset("storage/posters/{$this->fileName}");
        } else {
            return asset("storage/posters/_no_poster.png");
        }
    }

    public function screenings()
    {
        return $this->hasMany(Screening::class, 'movie_id');
    }
}
