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
        Schema::create('home_startup_items', function (Blueprint $table) {
            $table->id();
            $table->string('priority'); 
            $table->string('category'); 
            $table->string('request_message');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('amount', 10, 2); 
            $table->string('image_name')->nullable();
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_start_up');
    }
};
