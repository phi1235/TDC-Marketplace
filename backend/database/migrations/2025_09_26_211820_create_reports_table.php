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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->enum('target_type', ['listing', 'user']);
            $table->unsignedBigInteger('target_id');
            $table->foreignId('reporter_id')->constrained('users')->onDelete('cascade');
            $table->string('reason', 255);
            $table->text('description')->nullable();
            $table->enum('status', ['open', 'reviewing', 'resolved', 'rejected'])->default('open');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            
            $table->index(['target_type', 'target_id']);
            $table->index(['status', 'created_at']);
        });
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
