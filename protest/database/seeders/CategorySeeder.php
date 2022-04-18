<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //reset time pls
        $date = Carbon::tomorrow();
        Category::create([
            'id' => 1,
            'catename' => 'IT',
            'closure_date' => $date,
        ]);
        Category::create([
            'id' => 2,
            'catename' => 'BA',
            'closure_date' => $date,
        ]);
        Category::create([
            'id' => 3,
            'catename' => 'GD',
            'closure_date' => $date,
        ]);
        Category::create([
            'id' => 4,
            'catename' => 'Other',
            'closure_date' => $date,
        ]);
        Category::create([
            'id' => 5,
            'catename' => 'Academic',
            'closure_date' => $date,
        ]);
    }
}
