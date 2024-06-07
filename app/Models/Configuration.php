<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'ticket_price', 'customer_ticket_discount'];

    protected $primaryKey = 'id';

}
