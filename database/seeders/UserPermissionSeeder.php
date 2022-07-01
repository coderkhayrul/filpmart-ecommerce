<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'user index'],
            ['name' => 'user create'],
            ['name' => 'user show'],
            ['name' => 'user edit'],
            ['name' => 'user delete'],
        ];
        foreach ($users as $user) {
            Permission::create($user);
        }
    }
}
