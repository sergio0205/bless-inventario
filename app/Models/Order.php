<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'total',
    ];

    public function client()
    {
        return $this->belongsTo(client::class);
    }

    public function items()
    {
        return $this->hasmany(OrderItem::class);
    }
}
