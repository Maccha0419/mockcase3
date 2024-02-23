<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\Condition;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
    protected $model = Item::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'condition_id'=>Condition::factory(),
            'name'=>$this->faker->name,
            'brand'=>$this->faker->name,
            'price'=>$this->faker->numberBetween(100,10000),
            'description'=>$this->faker->sentence,
            'img_url'=>$this->faker->imageUrl,
        ];
    }
}
