<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'short_description',
        'description',
        'price',
        'quantity',
        'category_id',
    ];

    public function images()
    {
        return $this->hasMany(Images::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeSorting($query, $orderBy, $typeSort, $pagesize)
    {
        return $query->orderby($orderBy, $typeSort)->paginate($pagesize);
    }

    public function  scopeSearch($query, $search, $product_cate_id, $orderBy, $typeSort, $pagesize)
    {
        return $query->where('name', 'like', '%' . $search . '%')
            ->where('category_id', 'like', '%' . $product_cate_id . '%')
            ->orderBy($orderBy, $typeSort)
            ->paginate($pagesize);
    }
}
