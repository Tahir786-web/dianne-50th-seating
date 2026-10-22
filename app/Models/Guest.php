<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'guest_name',
        'first_name',
        'last_name',
        'phone',
        'table_name',
        'table_number',
        'seat_number',
        'flower',
        'type',
        'primary_guest',
    ];
}