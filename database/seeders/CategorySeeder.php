<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Furniture and interior decoration',
            'Food and grocery',
            'Kitchen appliance',
            'Catering equipment',
            'Health and beauty',
            'Handicrafts and decorative',
            'Clothes, shoes and accessories',
            'Sport equipment',
            'Toys, children and baby',
            'Petrochemicals',
            'Construction material and equipment',
        ];

        foreach ($categories as $category) {
            Category::create(['category' => $category]);
        }
    }
}
