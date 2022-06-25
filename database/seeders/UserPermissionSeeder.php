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
            ['name' => 'User Index'],
            ['name' => 'User Create'],
            ['name' => 'User Show'],
            ['name' => 'User Edit'],
            ['name' => 'User Delete'],
        ];
        foreach ($users as $user) {
            Permission::create($user);
        }
    }
}
