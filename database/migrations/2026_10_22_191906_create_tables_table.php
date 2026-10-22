<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');                 // e.g. "The White Rose Table"
            $table->string('slug')->unique();
            $table->string('flower_type')->nullable(); // Rose, Dahlia, etc.
            $table->text('description')->nullable();
            $table->enum('status', ['available', 'reserved', 'occupied'])->default('available');
            $table->unsignedInteger('capacity')->default(8);
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
