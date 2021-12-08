<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin=User::query()->create([
            'role_id' => Role::query()->where('title','admin')->first()->id,
            'name' => 'javad Admin',
            'email' => 'mhmdjvadzx83@gmail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
