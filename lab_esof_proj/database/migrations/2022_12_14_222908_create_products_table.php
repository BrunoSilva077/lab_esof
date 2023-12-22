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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->Float('price');
            $table->string('description');
            $table->integer('stock');
            $table->boolean('active');
            $table->unsignedBigInteger('categories_id');
            $table->unsignedBigInteger('brand_id');
            $table->timestamps();


            $table->foreign('brand_id', 'fk_products_brands')
            ->references('id')
            ->on('brands')
            ->onUpdate('cascade')
            ->onDelete('RESTRICT');

            $table->foreign('categories_id', 'fk_products_categories')
            ->references('id')
            ->on('categories')
            ->onUpdate('cascade')
            ->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
