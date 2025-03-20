<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // (optioneel) Als je custom table name hebt
    protected $table = 'products';

    // Mass-assignment fields
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

    // Type casting
    protected $casts = [
        'ProductionTime' => 'datetime',
        'Price' => 'decimal:2',
        'Stock' => 'integer',
    ];

    // Timestamps aan of uit
    public $timestamps = true;

    // Relatie met Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
