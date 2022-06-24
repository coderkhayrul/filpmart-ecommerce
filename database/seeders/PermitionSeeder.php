<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'User Index'],
            ['name' => 'User Create'],
            ['name' => 'User Show'],
            ['name' => 'User Edit'],
            ['name' => 'User Delete'],
        ];
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
