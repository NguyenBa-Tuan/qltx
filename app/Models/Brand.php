<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
