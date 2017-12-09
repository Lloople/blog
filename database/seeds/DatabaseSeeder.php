<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ThemesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(BackendUserSeeder::class);
    }
}
