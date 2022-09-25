<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'description',
        'price',
        'price_after_sale',
        'qty',
        'per',
        'category_id',
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Images()
    {
        return $this->hasMany(Image::class);
    }

    public function Wish()
    {
        return $this->belongsTo(Wish::class);
    }

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function Reviews()
    {
        return $this->hasMany(Review::class);
    }

}
