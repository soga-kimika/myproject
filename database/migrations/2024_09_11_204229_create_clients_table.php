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
        // プロフィール情報
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->integer('adult_count');
            $table->integer('child_count');
            $table->text('pet');
            $table->text('land_budget_exists')->nullable();;
            $table->string('building_area');
            $table->string('land_budget');
            $table->string('building_budget');
            $table->string('land_area');
            $table->string('floors');
            $table->string('layout');
            $table->string('regularCars');
            $table->string('compactCars');
            $table->string('motorcycles');
            $table->string('bicycles');
            $table->string('construction_area')->nullable();
            $table->date('date')->nullable();
            $table->string('current_home_issues')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
