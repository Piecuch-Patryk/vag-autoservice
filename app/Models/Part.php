<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];

    public function invoices()
    {
        return $this->belongsToMany(
            Invoice::class,
            'invoices_parts',
            'part_id',
            'invoice_id',
        );
    }
}
