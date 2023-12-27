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
        Schema::create('favoritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            
            $table->foreign('user_id', 'fk_favoritos_users')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('RESTRICT');
            $table->foreign('product_id', 'fk_favoritos_products')
                ->references('id')
                ->on('products')
                ->onUpdate('cascade')
                ->onDelete('RESTRICT');    
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favoritos');
    }
};