<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class BrandPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            ['name' => 'Brand Index'],
            ['name' => 'Brand Create'],
            ['name' => 'Brand Show'],
            ['name' => 'Brand Edit'],
            ['name' => 'Brand Delete'],
        ];
        foreach ($brands as $brand) {
            Permission::create($brand);
        }
    }
}
