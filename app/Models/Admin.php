<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'admin_id',
        'name',
        'email',
        'phone_number',
        'role',
        'password',
    ];
}
