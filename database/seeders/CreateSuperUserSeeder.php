<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateSuperUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'superuser', 
            'email' => 'superuser@mail.com', 
            'password' => 'password'
        ]);
        $role = Role::create(['name' => 'superuser']); 
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions); 
        $user->assignRole([$role->id]);
    }
}