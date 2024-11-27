<?php
// Create migration using artisan
// php artisan make:migration create_branches_table

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('branches', function (Blueprint $table) {
            // Primary Key
            $table->id();
            
            // Branch Details
            $table->string('name')->unique();
            
            // Foreign Keys with Constraints
            $table->foreignId('location_id')
                  ->constrained('locations')
                  ->onUpdate('cascade')
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
            $table->index(['name', 'location_id']);
            $table->index('created_by');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};