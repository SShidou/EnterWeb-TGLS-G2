<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => 1,
            'name' => 'Admin1',
            'username' => 'Admin1',
            'role' => '1',
            'email' => 'admin1@test.com',
            'password' => bcrypt('admin123'),
        ]);
        User::create([
            'id' => 2,
            'name' => 'QAM01',
            'username' => 'Manager_1',
            'role' => '2',
            'phonenumber' => '012332123',
            'email' => 'qam01@test.com',
            'password' => bcrypt('321dsa'),
        ]);
        User::create([
            'id' => 3,
            'name' => 'QAC01',
            'username' => 'Coordinator_1',
            'role' => '3',
            'phonenumber' => '045654560',
            'email' => 'qac01@test.com',
            'password' => bcrypt('123dsa'),
        ]);
        User::create([
            'id' => 4,
            'name' => 'QAC02',
            'username' => 'Coordinator_2',
            'role' => '3',
            'phonenumber' => '045654562',
            'email' => 'qac02@test.com',
            'password' => bcrypt('123dsa'),
        ]);
        User::create([
            'id' => 5,
            'name' => 'userBeta',
            'username' => 'userBeta',
            'role' => '4',
            'phonenumber' => '086546321',
            'email' => 'userbeta1@test.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
