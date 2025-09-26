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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->string('title', 150);
            $table->foreignId('category_id')->constrained()->onDelete('restrict');
            $table->enum('condition_grade', ['A', 'B', 'C', 'D']);
            $table->decimal('price', 12, 2);
            $table->decimal('original_price', 12, 2)->nullable();
            $table->text('description')->nullable();
            $table->json('photos')->nullable();
            $table->foreignId('campus_pickup_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('status', ['draft', 'pending', 'active', 'sold', 'hidden'])->default('pending');
            $table->integer('view_count')->default(0);
            $table->timestamps();
            
            $table->index(['status', 'created_at']);
            $table->index(['category_id', 'status']);
        });
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
