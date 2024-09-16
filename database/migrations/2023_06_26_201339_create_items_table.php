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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->string('name', 100)->nullable()->index();
            $table->string('type', 100)->nullable();
            $table->string('detail', 500)->nullable();
            $table->timestamps();
            $table->enum('priority',['high','medium','low','remove']);
            $table->enum('category',['toilet', 'bath', 'idea', 'feedback', 'outside', 'interior','bedroom','kidsroom','storage','other','living','dining']);
            $table->string('image_url')->nullable();
            $table->string('request_message',255)->nullable();
            $table->integer('card_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
