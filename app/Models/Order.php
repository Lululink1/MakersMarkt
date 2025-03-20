<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'seller_id',
        'email',
        'full_name',
        'house_number',
        'city',
        'postal_code',
        'shipping_method',
        'payment_method',
        'status',
        'description',
        'date',
    ];

    // Relatie naar de koper
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relatie naar de verkoper (optioneel)
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}
