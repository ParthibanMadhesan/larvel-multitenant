<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
       
        Role::create(['name'=>'admin']);
        Role::create(['name'=>'hr']);
        Role::create(['name'=>'publisher']);
        Role::create(['name'=>'writer']);
       
    }
}
