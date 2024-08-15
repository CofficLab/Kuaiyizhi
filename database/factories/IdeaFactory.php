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
            'content'   => "<h1>" . fake()->text(12) . "</h1>"
            . fake()->text(600)
            . $this->makeBase64Content()
            . $this->makeCodeContent()
            . $this->makeHeadingContent()
            . fake()->text(600)
            . $this->makeHeadingContent()
            . fake()->text(600)
            . $this->makeBase64Content()
            . $this->makeHeadingContent()
            . fake()->text(60)
            . $this->makeHeadingContent()
            . fake()->text(60)
            . $this->makeHeadingContent()
            . fake()->text(60),
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

    private function makeHeadingContent()
    {
        $h = 'h' . mt_rand(2, 5);
        return "<$h>" . fake()->text(50) . "</$h>";
    }

    private function makeCodeContent()
    {
        return "<pre><code>console.log('" . fake()->colorName() . "')</code></pre>";
    }

    private function makeBase64Content()
    {
        return "<img src=\"data:image/png;base64," . base64_encode(file_get_contents(public_path('favicon.ico'))) . "\" alt='Image'>";
    }
}
