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

        $themes = collect([
            [
                'name'                        => 'Default Theme',
                'selected'                    => true,
                'background'                  => 'grey-lighter',
                'container_background'        => 'white',
                'posts_list_background'       => 'grey-lighter',
                'menu_item_text'              => 'black',
                'menu_item_background'        => 'white',
                'menu_item_active_text'       => 'black',
                'menu_item_active_background' => 'black',
                'categories_list_text'        => 'black',
                'categories_list_background'  => 'black',
                'tags_list_text'              => 'black',
                'tags_list_background'        => 'black',
                'title'                       => 'black',
                'text'                        => 'black',
            ],
        ]);

        $themes->each(function ($theme) {
            \App\Models\Theme::create($theme);
        });
    }
}
