<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'email', 'full_name', 'house_number',
        'city', 'postal_code', 'shipping_method',
        'payment_method', 'status'
    ];
}
