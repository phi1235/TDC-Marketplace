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
        Schema::create('disputes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->foreignId('opener_id')->constrained('users')->onDelete('cascade');
            $table->text('reason');
            $table->enum('status', ['open', 'negotiating', 'resolved', 'closed'])->default('open');
            $table->string('result', 120)->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disputes');
    }
};
