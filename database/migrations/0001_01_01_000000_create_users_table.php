<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            // Primary Key
            $table->id();
            
            // User Identification
            $table->string('user_id')->unique(); // Format: user_001
            $table->string('first_name');
            $table->string('other_names');
            
            // Secure Email Storage
            $table->string('work_email_hashed')->unique(); // For lookups
            $table->text('work_email_encrypted'); // For sending OTP
            
            // Secure Mobile Storage
            $table->string('mobile_number_hashed')->unique(); // For lookups
            $table->text('mobile_number_encrypted'); // For sending OTP
            
            // Basic Information
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('designation');
            
            // Organizational Structure (Foreign Keys)
            $table->foreignId('department_id')
                  ->constrained()
                  ->onDelete('restrict');
                  
            $table->foreignId('directorate_id')
                  ->constrained()
                  ->onDelete('restrict');
                  
            $table->foreignId('branch_id')
                  ->constrained()
                  ->onDelete('restrict');
                  
            $table->foreignId('role_id')
                  ->constrained()
                  ->onDelete('restrict');
            
            // Account Management
            $table->boolean('account_status')->default(true);
            $table->text('otp_code_encrypted')->nullable();
            $table->timestamp('otp_expires_at')->nullable();
            $table->string('password_hashed');
            
            // Jetstream Specific
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            
            // Additional Security Fields
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->integer('failed_login_attempts')->default(0);
            $table->timestamp('locked_until')->nullable();
            
            // Account Verification
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            
            // Standard Laravel Fields
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes for Performance
            $table->index(['work_email_hashed', 'mobile_number_hashed']);
            $table->index(['department_id', 'directorate_id', 'branch_id']);
            $table->index('account_status');

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
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};