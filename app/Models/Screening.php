<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Theater;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'movie_id', 'theater_id', 'date', 'start_time'];

    protected $primaryKey = 'id';

    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }


    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id', 'id');
    }
}
