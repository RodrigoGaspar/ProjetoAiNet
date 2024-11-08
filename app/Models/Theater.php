<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'photo_filename'];

    protected $primaryKey = 'id';

    public $timestamps = false;

    public function screenings(): HasMany
    {
        return $this->hasMany(Screening::class);
    }

}
