<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [

            'Electrician',
            'Plumber',
            'Painter',
            'Cleaner',
            'Mechanic',
            'Carpenter',
            'AC Repair',
            'Computer Repair'

        ];

        foreach($categories as $cat)
        {
            Category::create([
                'name'=>$cat,
                'slug'=>str()->slug($cat)
            ]);
        }
    }
}