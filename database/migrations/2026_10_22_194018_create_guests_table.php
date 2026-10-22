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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name');
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('phone')->nullable();
            $table->string('table_name');          // e.g. The White Rose
            $table->string('table_number')->nullable(); // e.g. 1
            $table->string('seat_number')->nullable();  // e.g. 11
            $table->string('flower')->nullable();       // for image/animation
            $table->string('type')->nullable();         // Primary / Guest / Linked
            $table->string('primary_guest')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
