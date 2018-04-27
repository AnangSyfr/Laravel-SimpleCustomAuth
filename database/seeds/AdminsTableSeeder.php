<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => str_random(20),
            'email' => str_random(10).'@something.com',
            'password' => bcrypt('admin123')
        ]);
    }
}
