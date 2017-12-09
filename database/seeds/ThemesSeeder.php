<?php

use App\Models\Theme;
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

        factory(Theme::class)->create();

        $themes->each(function ($theme) {
            factory(Theme::class)->create($theme);

        });
    }
}
