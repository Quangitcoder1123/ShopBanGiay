<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'adminskymart',
            'email' => 'vietnq812@gmail.com', 
            'password' => 'admin123',
            'name' => 'Sky Mart Admin',
            'avatar' => 'user.png',
            'phone' => '0829061243',
            'birthday' => '2000-11-8',
            'gender' => 1,
            'role' => 1,
        ]);
        for($i=2; $i <= 20; $i++)
        {
            User::create(
                [
                    'username' => 'user'.$i,
                    'email' => $i . 'email@skymart.com', 
                    'password' => '123456789',
                    'name' => 'Sky Mart ' . $i,
                    'avatar' => 'user.png',
                    'phone' => '0987654321',
                    'birthday' => '2000-11-8',
                    'gender' => '1',
                    'role' => '0',
                ],
            );
        }
    }
}
