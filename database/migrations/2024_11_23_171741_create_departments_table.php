<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            // Primary Key
            $table->id();
            
            // Department Information
            $table->string('name');
            
            // Foreign Key to Directorate Table
            $table->foreignId('directorate_id')
                  ->constrained('directorates')
                  ->onDelete('restrict');
                  
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
            $table->index(['name', 'directorate_id']);
            $table->index('created_by');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};