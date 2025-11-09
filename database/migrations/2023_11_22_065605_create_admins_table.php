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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->text('role', 32);
            $table->string('phone', 32)->unique();
            $table->string('email', 64)->unique();
            $table->string('password', 128);
            $table->string('photo', 64)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
            $table->tinyInteger('email_verified_status')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
