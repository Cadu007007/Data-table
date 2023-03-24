<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier',
        'invoice_num',
        'art',
        'quantity',
        'currency',
        'rech_art',
        'customs',
        'vat',
        'shipment',
        'assignment',
    ];
}
