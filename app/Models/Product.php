<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Als je de tabelnaam niet volgt in de conventie, kun je het hier specificeren
    protected $table = 'products';

    // Geef de velden aan die je wilt vullen (mass-assignment)
    protected $fillable = [
        'ProductId',
        'Name',
        'Description',
        'Material',
        'ProductionTime',
        'Sustainability',
        'Price',
        'Stock',
    ];

    // Als de kolom 'created_at' of 'updated_at' niet in je tabel staat
    // kun je dit uitschakelen (wat handig kan zijn voor legacy systemen)
    public $timestamps = true;
}
