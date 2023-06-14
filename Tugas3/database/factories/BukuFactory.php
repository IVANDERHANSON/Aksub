<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $publicationYear = $this->faker->dateTimeBetween('-100 years', 'now')->format('Y');

        return [
            'title' => $this->faker->sentence(2),
            'author' => $this->faker->name(),
            'publicationYear' => Carbon::createFromFormat('Y', $publicationYear)->format('Y-m-d'),
            'totalPage' => $this->faker->numberBetween(10, 1000),
            'image' => $this->faker->imageUrl()
        ];
    }
}
