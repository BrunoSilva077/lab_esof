<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Cashier\Subscription as CashierSubscription;

class Checkout extends Model
{
    use HasFactory;
    protected $table = 'checkouts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total',
        'voucher_code',
        'productnames',
        'address',
        'post_code',
        'city',
        'country',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
