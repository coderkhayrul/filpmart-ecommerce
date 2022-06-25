<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class ProductPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['name' => 'Product Index'],
            ['name' => 'Product Create'],
            ['name' => 'Product Show'],
            ['name' => 'Product Edit'],
            ['name' => 'Product Delete'],
        ];
        foreach ($products as $product) {
            Permission::create($product);
        }
    }
}
