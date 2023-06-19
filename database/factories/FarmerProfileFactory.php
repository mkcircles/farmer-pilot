<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FarmerProfile>
 */
class FarmerProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'dob' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gender' => $this->faker->randomElement(['male','female']),
            'education_level' => $this->faker->randomElement(['primary','secondary','tertiary','university','none']),
            'phone_number' => $this->faker->phoneNumber,
            'id_number' => $this->faker->randomDigit,
            'marital_status' => $this->faker->randomElement(['single','married','divorced','widowed']),
            'district' => $this->faker->city(),
            'county' => $this->faker->city(),
            'sub_county' => $this->faker->city(),
            'parish' => $this->faker->city(),
            'village' => $this->faker->city(),
            'fpo_name' => $this->faker->company,
            'farmer_cordinates' => $this->faker->latitude($min = -90, $max = 90) . ',' . $this->faker->longitude($min = -180, $max = 180),
            'next_of_kin' => $this->faker->name(),
            'next_of_kin_contact' => $this->faker->phoneNumber,
            'next_of_kin_relationship' => $this->faker->randomElement(['father','mother','brother','sister','uncle','aunt','nephew','niece','cousin','grandfather','grandmother','grandson','granddaughter','friend','other']),
            'male_members_in_household' => $this->faker->randomDigitNotZero(),
            'female_members_in_household' => $this->faker->randomDigitNotZero(),
            'members_above_18' => $this->faker->randomDigitNotZero(),
            'children_below_5' => $this->faker->randomDigitNotZero(),
            'school_going_children' => $this->faker->randomDigitNotZero(),
            'head_of_family' => $this->faker->randomElement(['father','mother','brother','sister','uncle','aunt','nephew','niece','cousin','grandfather','grandmother','grandson','granddaughter','friend','other']),
            'how_much_do_you_earn_from_agricultural_activities' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'how_much_do_you_earn_from_non_agricultural_activities' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'do_you_have_an_account_with_an_FI' => $this->faker->randomElement(['yes','no']),
            'farm_size' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'farm_size_under_agriculture' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'land_ownership' => $this->faker->randomElement(['private','leased','rented','customary tenure']),
            'type_of_farming' => $this->faker->randomElement(['crop','animals','mixed']),
            'crops_grown' => $this->faker->faker->randomElement(['maize','beans','cassava','sweet potatoes','irish potatoes','millet','sorghum','rice','wheat','soya beans','ground nuts','sunflower','coffee','tea','bananas','cotton','tobacco','simsim','sugar cane','cocoa','vanilla','other']),
            'animals_kept' => $this->faker->faker->randomElement(['cattle','goats','sheep','pigs','chicken','turkey','guinea fowl','rabbits','fish','bees','other']),
            'estimated_produce_value_last_season' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'estimated_produce_value_this_season' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1000000),
            'rId' => null,
            'consumerDeviceId' => null,
            'data_captured_by' => $this->faker->name(),
        ];
    }
}
