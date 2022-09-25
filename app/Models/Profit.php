<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;
    protected $fillable = [
        'profit_id',
        'order_id',
        'total',
    ];

    public function Order() {
        return $this->belongsTo(Order::class);
    }
}
