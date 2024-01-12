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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('address');
            $table->integer('post_code');
            $table->string('city');
            $table->string('country');
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->string('voucher')->nullable();
            $table->json('productnames')->nullable();

            $table->timestamps();

            $table->foreign('user_id', 'fk_checkout_users')
            ->references('id')
            ->on('users')
            ->onUpdate('cascade')
            ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout');
    }
};
