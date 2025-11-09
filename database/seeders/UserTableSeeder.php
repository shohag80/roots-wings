<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Md. Farid Hosssain',
            'phone' => '+8801975134226',
            'email' => 'mdfaridhossain8080@gmail.com',
            'password' => bcrypt('019751342256'),
            'photo' => 'User_Photo.jpg',
        ]);
    }
}
