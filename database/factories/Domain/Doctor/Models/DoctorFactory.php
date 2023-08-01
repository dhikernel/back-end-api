<?php

namespace Database\Factories\Domain\Doctor\Models;

use App\Domain\Doctor\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'specialty' => $this->faker->randomElement(['Cardiologísta' , 'Oncologísta', 'Neurologísta']),
            'city_id' => rand(1, 27),
        ];
    }
}
