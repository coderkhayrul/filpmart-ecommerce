<?php

namespace Database\Seeders;

use App\Models\BasicInfo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'phone' => '01835061968',
            'role' => 1,
            'slug' => 'u-admin',
            'password' => Hash::make('password')
        ]);

        BasicInfo::create([
            'basic_company' => 'Flipmart',
            'basic_title' => 'Flipmart Ecommarce Store',
            'basic_header_logo' => '',
            'basic_footer_logo' => '',
            'basic_favicon' => '',
            'basic_status' => 1
        ]);
    }
}
