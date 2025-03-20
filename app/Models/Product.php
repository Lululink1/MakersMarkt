<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category',
        'material',
        'production_time',
        'sustainability',
        'price',
        'stock',
        'images',
        'specifications',
        'status',
        'user_id', // Changed to user_id
    ];

    protected $casts = [
        'production_time' => 'datetime',
        'price' => 'decimal:2',
        'images' => 'array',
        'specifications' => 'array',
    ];

    public function user() // Changed artist() to user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Changed to user_id
    }
}