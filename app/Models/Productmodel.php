<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productmodel extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'des',
        'code',
        'size',
        'color',
        'purchase_price',
        'sell_price'
    ];
}
