<?php

namespace Database\Factories;

use App\Models\Idea;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid'      => uuid_create(),
            'title'     => fake()->name(),
            'content'   => "<h1>" . fake()->text(12) . "</h1>" . fake()->text(6000) . $this->makeCodeContent(),
            'parent_id' => config('app.root_name'),
            'priority'  => fake()->numberBetween(1, 100),
        ];
    }

    public function parentOf(Idea $idea)
    {
        return $this->state(function (array $attributes) use ($idea) {
            return [
                'parent_id' => $idea->uuid,
            ];
        });
    }

    private function makeCodeContent()
    {
        return "<pre><code>" . fake()->text(50) . "</code></pre>";
    }
}
