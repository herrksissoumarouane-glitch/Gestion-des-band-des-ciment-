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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 11)->default('')->unique();
            $table->string('email', 250)->unique();
            $table->string('prenom', 150)->default('unk'); 
            $table->enum('role', ['1', '2', '3']);
            $table->enum('actif', ['0', '1'])->default('1');
            $table->enum('notif_vu', ['vu', 'nov'])->default('nov');
            $table->string('created_by', 100)->default('system');   
            $table->string('updated_by', 100)->nullable();   
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');  
            $table->timestamps();
            $table->softDeletes();
          
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
