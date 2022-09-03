<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillabe = [
        'order_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address',
        'country',
        'city',
        'remark'
    ];
    
}
