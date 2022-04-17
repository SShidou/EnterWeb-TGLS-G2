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
    {
        $date = Carbon::tomorrow();
        Category::create([
           'catename' => 'IT',
            'closure_date' => $date,
        ]);
        Category::create([
            'catename' => 'BA',
            'closure_date' => $date,
        ]);
        Category::create([
            'catename' => 'GD',
            'closure_date' => $date,
        ]);
        Category::create([
            'catename' => 'Other',
            'closure_date' => $date,
        ]);
        Category::create([
            'catename' => 'Academic',
            'closure_date' => $date,
        ]);
    }
}
