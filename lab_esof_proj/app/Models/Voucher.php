<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_voucher',
        'tipo_percentual',
        'valor_desconto',
        // Adicione outros campos conforme necessário
    ];
}
