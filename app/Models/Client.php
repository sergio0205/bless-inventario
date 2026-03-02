<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use softDeletes;
    use HasFactory;

    protected $fillable = [
        'document',
        'name',
        'address',
        'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
