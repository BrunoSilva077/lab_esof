<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'stock',
        'active',
        'categories_id',
        'brand_id',
    ];

    public function images()
    {
        return $this->hasMany(Images::class, 'product_id', 'id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'product_user', 'user_id', 'product_id');
    }

    public function categorie(){
        return $this->belongsTo(Categories::class, 'categories_id', 'id');
    }

    public function brand(){
        return $this->belongsTo(Brands::class, 'brand_id', 'id');
    }

    public function favorito()
    {
        return $this->hasMany(Favorito::class,'product_id','id');
    }
    public function checkout()
    {
        return $this->hasMany(Cart::class,'product_id','id');
    }
}
