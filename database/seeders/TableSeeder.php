<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $tables = [
        'Table',
        'The White Rose Table',
        'The Dahlia Table',
        'Dais Table',
        'The Alstroemeria Table',
        'The Lisianthus Table',
        'The Mini Calla Table',
        'The Aster Table',
        'The Snapdragon Table',
        'The Stock Flower Table',
        'The Cymbidium Orchid Table',
        'The Garden Hydrangea',
    ];

    foreach ($tables as $name) {
        \App\Models\Table::create([
            'name'        => $name,
            'flower_type' => str_replace(['The ', ' Table'], '', $name),
            'status'      => 'available',
            'capacity'    => 8,
            'description' => "Beautiful table arrangement featuring {$name}.",
        ]);
    }
}
}
