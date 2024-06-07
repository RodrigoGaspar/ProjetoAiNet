<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theather extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'photo_filename'];

    protected $primaryKey = 'id';

}
