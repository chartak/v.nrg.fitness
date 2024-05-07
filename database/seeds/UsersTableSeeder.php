<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$n08nFgJ8mQHCvxyz6MP9feaet/p4zxVXIMvNOooRNnQ2vZpwtWRB6',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
