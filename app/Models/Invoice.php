<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'amount',
        'make',
        'model',
        'registration',
        'vin',
        'milage',
        'description',
        'jobs',
        'parts',
    ];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'invoices_products',
            'invoice_id',
            'product_id',
        );
    }
}
