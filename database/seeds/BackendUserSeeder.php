<?php

use Illuminate\Database\Seeder;

class BackendUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class)->create([
            'name' => 'Administrator',
            'email' => 'admin@blog.dev',
            'password' => bcrypt('admin')
        ]);
    }
}
