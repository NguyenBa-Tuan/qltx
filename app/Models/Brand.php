<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehicle;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    public function vehicle()
    {
        return $this->hasMany(Vehicle::class);
    }
}
