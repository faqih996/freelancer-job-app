<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John Doe',
                'email' => 'john@mail.com',
                'password' => hash::make('admin1234'),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],

            [
                'name' => 'Jane Doe',
                'email' => 'jane@mail.com',
                'password' => hash::make('admin1234'),
                'remember_token' => NULL,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]
        ];

        User::insert($users);
    }
}
