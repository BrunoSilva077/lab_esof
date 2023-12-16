<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Products;


class ImagesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $imagePath = 'public/storage/images';

        // Obtém todos os arquivos da pasta de imagens
        $images = File::allFiles($imagePath);

        // Verifica se há imagens disponíveis
        if (count($images) > 0) {
            // Seleciona uma imagem aleatória
            $randomImage = $this->faker->randomElement($images);

            return [
                'name' => $this->faker->name(),
                'path' => 'storage/images/' . $randomImage->getFilename(),
                'product_id' => Products::all()->random()->id
            ];
        }

        return [
            'name' => $this->faker->name(),
            'path' => 'storage/images/error.jpg', // Caminho de uma imagem padrão em caso de erro
            'product_id' => '0'
        ];
    }

}
