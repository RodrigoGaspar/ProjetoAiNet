<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'customer_id', 'date', 'total_price', 'customer_name', 'customer_email', 'nif', 'payment_type', 'payment_ref', 'receipt_pdf_filename'];

    protected $primaryKey = 'id';

    public function Customer() : HasOne
    {
        return $this->hasOne(Customer::class,'customer_id','id');
    }

}
