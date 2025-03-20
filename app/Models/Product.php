<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductId',
        'Name',
        'Description',
        'Material',
        'ProductionTime',
        'Sustainability',
        'Price',
        'Stock',
        'category_id',
    ];

    protected $casts = [
        'ProductionTime' => 'datetime',
        'Price' => 'decimal:2',
        'Stock' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
