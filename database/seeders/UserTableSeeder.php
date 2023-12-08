<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "Admin";
        $user->username = "admin";
        $user->email = "admin@mail.com";
        $user->role ="admin";
        $user->date_of_birth="2022-01-01";
        $user->password = bcrypt('admin123'); 
        $user->save();
    }
}
