<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Category Index'],
            ['name' => 'Category Create'],
            ['name' => 'Category Show'],
            ['name' => 'Category Edit'],
            ['name' => 'Category Delete'],
        ];
        foreach ($categories as $category) {
            Permission::create($category);
        }
    }
}
