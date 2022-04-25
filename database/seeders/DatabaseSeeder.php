<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Actor::factory(10)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Film::factory(10)->create();

        $actors = \App\Models\Actor::all();
        \App\Models\Film::all()->each(function ($film) use ($actors) {
            $film->actors()->attach(
                $actors->random(rand(1,10))->pluck('id')->toArray()
            );
        });
    }
}
