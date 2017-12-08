<?php

use Illuminate\Database\Seeder;

class ThemesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('themes')->truncate();

        $themes = collect([]);

        factory(\App\Models\Theme::class)->create();

        $themes->each(function ($theme) {
            factory(\App\Models\Theme::class)->create($theme);

        });
    }
}
