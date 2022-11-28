<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'booking_number',
        'user_id',
        'vehicles_id',
        'status',
        'from_data',
        'to_data',
    ];
}
