<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'price',
        'pickup_date',
        'pickup_time',
        'customer_name',
        'customer_email',
        'customer_phone',
        'payment'
    ];
}