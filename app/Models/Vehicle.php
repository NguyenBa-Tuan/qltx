<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'price_day',
        'model_year',
        'seating_capacity',
        'overview',
        'image',
        'license_plates',
        'fuel_type',
        'brand_id',
    ];

    public function brand()
    {
        return $this->belongsToMany(Brand::class);
    }
    
}
