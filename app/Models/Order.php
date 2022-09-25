<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'cart_id',
        'order_status',
        'total',
        'user_id',
    ];

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Profit()
    {
        return $this->belongsTo(Profit::class);
    }
}
