<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'body' => [],
        ];
    }

    public function untitled()
    {
        return $this->state([
            'title' => 'Untitled',
        ]);
    }
}
