<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'subtotal',
        'tax',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')->withPivot('quantity');
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function setSubtotalAttribute($value)
    {
        $this->attributes['subtotal'] = str_replace(',', '', $value);
    }

    public function setTaxAttribute($value)
    {
        $this->attributes['tax'] = str_replace(',', '', $value);
    }

    public function setTotalAttribute($value)
    {
        $this->attributes['total'] = str_replace(',', '', $value);
    }
}
