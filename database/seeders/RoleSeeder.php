<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::query()->create([
            'title' => 'admin'
        ]);

        $admin->permissions()->attach(Permission::all());

        Role::query()->insert([
            'title' => 'user'
        ]);
    }
}
