<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'movie_id', 'theater_id', 'date', 'start_time'];

    protected $primaryKey = 'id';

    public function movie() : HasOne
    {
        return $this->hasOne(Movie::class,'movie_id','id');
    }

    public function theater() : HasOne
    {
        return $this->hasOne(Theather::class,'theater_id','id');
    }
}
