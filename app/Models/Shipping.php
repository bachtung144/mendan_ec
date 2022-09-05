<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'mobile',
        'email',
        'line',
        'city',
        'province',
        'country',
        'zipcode',
        'order_id'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
