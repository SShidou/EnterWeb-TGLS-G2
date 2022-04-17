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
            'name' => 'Admin1',
            'username' => 'adminuser',
            'role' => '1',
            'email' => 'admin1@test.com',
            'password' => bcrypt('admin123'),
        ]);
        User::create([
            'name' => 'QAM01',
            'username' => 'qamanageruser',
            'role' => '2',
            'phonenumber' => '012332123',
            'email' => 'qam01@test.com',
            'password' => bcrypt('321dsa'),
        ]);
        User::create([
            'name' => 'QAC01',
            'username' => 'qacooruser1',
            'role' => '3',
            'phonenumber' => '045654560',
            'email' => 'qac01@test.com',
            'password' => bcrypt('123dsa'),
        ]);
        User::create([
            'name' => 'QAC02',
            'username' => 'qacooruser2',
            'role' => '3',
            'phonenumber' => '045654562',
            'email' => 'qac02@test.com',
            'password' => bcrypt('123dsa'),
        ]);
        User::create([
            'name' => 'userBeta',
            'username' => 'staff',
            'role' => '4',
            'phonenumber' => '086546321',
            'email' => 'userbeta1@test.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
