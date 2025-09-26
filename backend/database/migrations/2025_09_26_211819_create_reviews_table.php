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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('target_type', ['seller', 'listing']);
            $table->unsignedBigInteger('target_id');
            $table->tinyInteger('rating')->unsigned();
            $table->string('comment', 255)->nullable();
            $table->timestamps();
            
            $table->index(['target_type', 'target_id']);
            $table->unique(['user_id', 'target_type', 'target_id']);
        });
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
