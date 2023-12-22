<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('favorito_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('favorito_id');
            $table->unsignedBigInteger('product_id');
            // outros campos, se necessário
            $table->timestamps();
            $table->foreign('favorito_id')->references('id')->on('favoritos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('restrict');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorito_produtos');
    }
};
