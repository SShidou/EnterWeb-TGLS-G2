<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date_y = Carbon::yesterday();
        Department::create([
            'id' => 1,
            'deptname' => 'IT',
            'created_at'=> $date_y,
        ]);
        Department::create([
            'id' => 2,
            'deptname' => 'Academic',
            'created_at'=> $date_y,
        ]);
        Department::create([
            'id' => 3,
            'deptname' => 'Office',
            'created_at'=> $date_y,
        ]);
    }
}
