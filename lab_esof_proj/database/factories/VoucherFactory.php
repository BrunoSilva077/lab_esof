<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Voucher;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VoucherFactory extends Factory
{   

    protected $model = Voucher::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cod_voucher' => Str::upper(Str::random(3)),
            'tipo_percentual' => $this->faker->randomElement([0,1]),
            'valor_desconto' => random_int(0,100),
        ];
    }
}
