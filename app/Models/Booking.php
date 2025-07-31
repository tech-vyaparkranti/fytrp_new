<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'travel_date',
        'traveller_count',
        'package_name',
        'amount',
        'order_id',
        'payment_status',
    ];
}
