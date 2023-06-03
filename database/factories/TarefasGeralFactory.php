<?php

namespace Database\Factories;

use App\Models\TarefasGeral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TarefasGeral>
 */
class TarefasGeralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = TarefasGeral::class;

    public function definition()
    {
        return [
            'dia' => $this->faker->dateTimeThisYear($max = '+2 months', $timezone = 'America/Sao_Paulo')->format('d-m-Y'),
            'horario' => $this->faker->time($format = 'H:m'),
            'tarefa' => $this->faker->realText($maxNbChars = 175)
        ];
    }
}
