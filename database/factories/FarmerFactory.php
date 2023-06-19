<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FarmerProfile>
 */
class FarmerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'first_name' => $this->faker->firstName(),
            // 'last_name' => $this->faker->lastName(),
            // 'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            // 'gender' => $this->faker->randomElement(['male','female']),
            // 'education_level' => $this->faker->randomElement(['primary','secondary','tertiary','university','none']),
            // 'phone_number' => $this->faker->phoneNumber,
            // 'id_number' => $this->faker->randomNumber($nbDigits = 12, $strict = false),
            // 'marital_status' => $this->faker->randomElement(['single','married','divorced','widowed']),
            // 'district' => $this->faker->,
            // 'county' => $this->faker->county,
            // 'sub_county' => $this->faker->sub_county,
            // 'parish' => $this->faker->parish,
            // 'village' => $this->faker->village,
            // 'fpo_name' => $this->faker->company,
            // 'farmer_cordinates',
            // 'next_of_kin',
            // 'next_of_kin_contact',
            // 'next_of_kin_relationship',
            // 'male_members_in_household',
            // 'female_members_in_household',
            // 'members_above_18',
            // 'children_below_5',
            // 'school_going_children',
            // 'head_of_family',
            // 'how_much_do_you_earn_from_agricultural_activities',
            // 'how_much_do_you_earn_from_non_agricultural_activities',
            // 'do_you_have_an_account_with_an_FI',
            // 'farm_size',
            // 'farm_size_under_agriculture',
            // 'land_ownership',
            // 'type_of_farming',
            // 'crops_grown',
            // 'animals_kept',
            // 'estimated_produce_value_last_season',
            // 'estimated_produce_value_this_season' => $this->faker->faker->company,
            // 'rId' => null,
            // 'consumerDeviceId' => null,
            // 'data_captured_by' => $this->faker->name(),
        ];
    }
}
