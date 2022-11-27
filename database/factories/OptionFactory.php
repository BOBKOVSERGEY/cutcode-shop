<?php

namespace Database\Factories;

use Domain\Product\Models\Option;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Product\Models\Option>
 */
class OptionFactory extends Factory
{
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word())
        ];
    }
}
