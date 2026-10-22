<?php

// app/Models/Table.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Table extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name', 'slug', 'flower_type', 'description',
        'status', 'capacity', 'image',
    ];

    protected static function booted()
    {
        static::creating(function ($table) {
            $table->slug = $table->slug ?: Str::slug($table->name);
        });
    }
}
