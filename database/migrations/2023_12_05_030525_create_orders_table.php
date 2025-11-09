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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 64);
            $table->string('email', 64);
            $table->string('address', 64);
            $table->string('phone', 32);
            $table->double('amount', 16);
            $table->integer('payment_method')->comment('1 = cod, 2 = epay');
            $table->integer('payment_status')->comment('0 = pending, 1 = paid');
            $table->integer('order_status')->default(0)->comment('0 = pending, 1 = receive');
            $table->string('transaction_id', 128)->unique();
            $table->string('currency', 8)->default('BTD');
            $table->integer('delivery_status')->default(0)->comment('0 = pending, 1 = complete, 2 = cancel',);
            $table->tinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
