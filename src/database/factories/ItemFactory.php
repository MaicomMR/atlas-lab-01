<?php

namespace Database\Factories;

use App\Models\Lista;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $itens = ['papel higienico', 'Feijao', 'Arroz'];
        $rand = rand(0, (count($itens) -1) );
        $lista = Lista::inRandomOrder()->first();

        return [
            'item' => $itens[$rand],
            'lista_id' => $lista->id
        ];
    }
}

