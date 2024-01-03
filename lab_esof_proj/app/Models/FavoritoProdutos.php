<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritoProdutos extends Model
{
    use HasFactory;
    protected $fillable = ['favorito_id', 'produto_id', /* outros campos, se necessário */];
    public function favorito()
    {
        return $this->belongsTo(Favorito::class, 'favorito_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
