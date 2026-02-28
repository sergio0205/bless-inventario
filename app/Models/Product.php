<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'price',
        'stock_s',
        'stock_m',
        'stock_l',
    ];

    public function orderItems()
    {
        return $this->hasMany(orderItems::class);
    }
}
