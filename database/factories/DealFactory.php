<?php

namespace Database\Factories;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Deal>
 */
class DealFactory extends Factory
{
    protected $model = Deal::class;

    public function definition(): array
    {
        return [
            'title' => fake()->numberBetween(20, 75).'%OFF at '.fake()->company().' AI',
            'description' => fake()->sentence(8),
            'image' => null,
            'affiliate_url' => fake()->url(),
            'badge_text' => 'Deal',
            'sub_badge_text' => 'DISCOUNT DEAL',
            'button_text' => 'Shop Now',
            'is_active' => true,
            'order' => 0,
        ];
    }
}
