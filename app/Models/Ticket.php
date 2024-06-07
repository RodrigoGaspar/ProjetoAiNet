<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'screening_id', 'seat_id', 'purchase_id', 'price', 'qrcode_url', 'status'];

    protected $primaryKey = 'id';

    public function Screening() : HasOne
    {
        return $this->hasOne(Screening::class,'screening_id','id');
    }

    public function Seat() : HasOne
    {
        return $this->hasOne(Seat::class,'seat_id','id');
    }

    public function Purchase() : HasOne
    {
        return $this->hasOne(Purchase::class,'purchase_id','id');
    }
}
