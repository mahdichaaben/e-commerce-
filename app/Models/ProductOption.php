<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        // Add any other fillable attributes for the options if needed
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}