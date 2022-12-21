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
        'mileage',
        'description',
        'products',
        'parts',
    ];

    public function selectProducts()
    {
        return $this->belongsToMany(
            Product::class,
            'invoices_products',
            'invoice_id',
            'product_id',
        )->withPivot('qnty');
    }

    public function selectParts()
    {
        return $this->belongsToMany(
            Part::class,
            'invoices_parts',
            'invoice_id',
            'part_id',
        )->withPivot('qnty');
    }
}
