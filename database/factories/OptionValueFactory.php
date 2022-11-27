<?php

namespace Database\Factories;

use Domain\Product\Models\Option;
use Domain\Product\Models\OptionValue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Domain\Product\Models\OptionValue>
 */
class OptionValueFactory extends Factory
{
    protected $model = OptionValue::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word()),
            'option_id' => Option::query()->inRandomOrder()->value('id'),
        ];
    }
}
