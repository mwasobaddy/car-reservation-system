<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
                  
            // Audit Fields
            $table->string('created_by')->nullable(); // Format: user_001
            $table->string('updated_by')->nullable(); // Format: user_001
            $table->foreign('created_by')
                  ->references('user_id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->foreign('updated_by')
                  ->references('user_id')
                  ->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('set null');

            // Timestamps
            $table->timestamps();
            
            // Indexes for Performance
            $table->index(['name', 'departments_id']);
            $table->index('created_by');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};