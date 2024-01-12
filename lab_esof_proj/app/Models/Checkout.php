<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Subscription as CashierSubscription;

class Checkout extends CashierSubscription
{
    use HasFactory;
    protected $table = 'checkout';
    protected $fillable = [
        'user_id',         // ID do usuário associado à ordem
        'product_id',      // ID do produto (se aplicável)
        'quantity',        // Quantidade do produto
        'total',           // Total da venda
        'voucher_code',    // Código do voucher
        'productnames',    // Nome do produto
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
