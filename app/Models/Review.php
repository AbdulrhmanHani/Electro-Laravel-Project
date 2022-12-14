<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_id',
        'user_id',
        'product_id',
        'stars',
        'content',
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Product()
    {
        return $this->belongsTo(Product::class);
    }
}
