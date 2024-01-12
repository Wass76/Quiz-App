<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->realText($this->faker->numberBetween(10, 30));
        return [
            'name' => $name,
            'answer1'=>$this->faker->realText($this->faker->numberBetween(10, 16)),
            'answer2'=>$this->faker->realText($this->faker->numberBetween(10, 16)),
            'answer3'=>$this->faker->realText($this->faker->numberBetween(10, 16)),
            'answer4'=>$this->faker->realText($this->faker->numberBetween(10, 16)),
            'answer5'=>$this->faker->optional( $weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'answer6'=>$this->faker->optional($weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'answer7'=>$this->faker->optional($weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'answer8'=>$this->faker->optional($weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'answer9'=>$this->faker->optional($weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'answer10'=>$this->faker->optional($weight = 10,$this->faker->default = null)->realText($this->faker->numberBetween(10, 16)),
            'rank' =>$this->faker->optional($weight = 10 ,$default = 1)->randomElement([1, 2, 3, 4, 5 ,6 ,7 , 8 ,9])
        ];
    }
}
