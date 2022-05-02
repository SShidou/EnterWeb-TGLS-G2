<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now();
        Department::create([
            'id' => 1,
            'deptname' => 'IT',
        ]);
        Department::create([
            'id' => 2,
            'deptname' => 'Academic',
        ]);
        Department::create([
            'id' => 3,
            'deptname' => 'Office',
        ]);
    }
}
