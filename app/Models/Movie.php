<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function screenings(): HasMany
    {
        return $this->hasMany(Screening::class);
    }
}
