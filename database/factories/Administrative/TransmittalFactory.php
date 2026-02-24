<?php

namespace Database\Factories\Administrative;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransmittalFactory extends Factory
{
    public function definition(): array
    {
        static $number = 1;

        return [
            // Format: TRM2500001
            'trn_no' => 'TRM' . now()->format('y') . str_pad($number++, 5, '0', STR_PAD_LEFT),

            // Format: EMP240038
            'prepared_by' => 'EMP' . $this->faker->numberBetween(230000, 249999),
            'sender' => 'EMP' . $this->faker->numberBetween(230000, 249999),
            'recipient' => 'EMP' . $this->faker->numberBetween(230000, 249999),

            'date_created' => $this->faker->date(),

            'subject' => $this->faker->sentence(4),
            'others' => $this->faker->optional()->paragraph(),

            'checked_by' => $this->faker->optional()->randomElement([
                'EMP' . $this->faker->numberBetween(230000, 249999),
                null
            ]),

            'approved_by' => $this->faker->optional()->randomElement([
                'EMP' . $this->faker->numberBetween(230000, 249999),
                null
            ]),

            'received_by' => $this->faker->optional()->randomElement([
                'EMP' . $this->faker->numberBetween(230000, 249999),
                null
            ]),

            'date_received' => $this->faker->optional()->date(),

            'remarks' => $this->faker->optional()->sentence(),

            'status' => $this->faker->randomElement([
                'pending',
                'checked',
                'approved',
                'received',
                'cancelled'
            ]),

            'cancelled_reason' => $this->faker->optional()->sentence(),
            'cancelled_by' => $this->faker->optional()->randomElement([
                'EMP' . $this->faker->numberBetween(230000, 249999),
                null
            ]),
        ];
    }
}
