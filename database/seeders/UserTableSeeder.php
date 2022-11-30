<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'name',
            'email' => 'admin@mail.test',
            'password' => bcrypt('11111111'),
            'role' => '0',
        ]);

        User::create([
            'name' => 'name1',
            'email' => 'user@mail.test',
            'password' => bcrypt('11111111'),
            'role' => '1',
        ]);
    }
}
