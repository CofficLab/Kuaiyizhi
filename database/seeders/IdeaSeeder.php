<?php

namespace Database\Seeders;

use App\Models\Idea;
use Illuminate\Database\Seeder;

class IdeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Idea::find(config('app.root_name'))) {
            Idea::create([
                'uuid'      => config('app.root_name'),
                'title'     => '本地根节点',
                'content'   => '本地根节点',
                'parent_id' => '',
                'priority'  => 0,
            ]);
        }

        $root = Idea::find(config('app.root_name'));

        Idea::factory()->count(15)->parentOf($root)->create();

        Idea::query()->whereNot("uuid", config('app.root_name'))->inRandomOrder()->limit(5)->get()->each(function ($idea) {
            $idea->children()->saveMany(Idea::factory()->count(5)->parentOf($idea)->create());
        });

        Idea::query()->whereNot("uuid", config('app.root_name'))->inRandomOrder()->limit(6)->get()->each(function ($idea) {
            $idea->children()->saveMany(Idea::factory()->count(mt_rand(2, 500))->parentOf($idea)->create());
        });
    }
}
