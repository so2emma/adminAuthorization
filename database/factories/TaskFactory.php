<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $events = fake()->dateTimeBetween('-30 days', '+30 days');
        // $dateFormate = Carbon::createFromTimestamp('Y-m-d H:i:s', $events );

        $category_id = Category::all()->random()->id;
        $category = Category::find($category_id)->title;
        $status  = ["pending", "done", "overdue"];

        return [
            "category_id" => $category_id,
            "user_id" => User::all()->random()->id,
            "title" => fake()->sentence(),
            "category" => $category,
            "deadline" => now(),
            "status" => fake()->randomElement($status),
        ];
    }
}
