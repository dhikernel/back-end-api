<?php

namespace Database\Factories\Domain\Patient\Models;

use App\Domain\Patient\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'cpf' => (string) $this->faker->numberBetween('10000000000','99999999999'),
            'phone' => $this->faker->numerify('## #########'),
        ];
    }
}
