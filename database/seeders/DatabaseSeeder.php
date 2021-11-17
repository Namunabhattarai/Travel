<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        // \App\Models\User::factory(10)->create();
        Admin::insert([
            'name'=>"Namuna bhattarai",
            'email'=>"nnamuna999@gmail.com",
            'password'=>bcrypt("password"),
            'image'=>'',
            'phone'=>"9875433322",
            'role_id'=>1,
            'status'=>1


        ]);
    }
}
