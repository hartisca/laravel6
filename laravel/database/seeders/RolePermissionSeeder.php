<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'files.*']);
        Permission::create(['name' => 'files.list']);
        Permission::create(['name' => 'files.create']);
        Permission::create(['name' => 'files.update']);
        Permission::create(['name' => 'files.read']);
        Permission::create(['name' => 'files.delete']);

        Permission::create(['name' => 'places.*']);
        Permission::create(['name' => 'places.list']);
        Permission::create(['name' => 'places.create']);
        Permission::create(['name' => 'places.update']);
        Permission::create(['name' => 'places.read']);
        Permission::create(['name' => 'places.delete']);

        Permission::create(['name' => 'post.*']);
        Permission::create(['name' => 'post.list']);
        Permission::create(['name' => 'post.create']);
        Permission::create(['name' => 'post.update']);
        Permission::create(['name' => 'post.read']);
        Permission::create(['name' => 'post.delete']);

        $adminRole = Role::create(['name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor']);
        $authorRole = Role::create(['name' => 'author']);

        $adminRole->givePermissionTo(['files.list',
        'files.read',
        'places.list',
        'places.read',
        'post.list',
        'post.read']);

        $editorRole->givePermissionTo(['files.read',
        'files.update',
        'files.list',
        'places.read',
        'places.update',
        'places.list',
        'post.read',
        'post.update',
        'post.list']);
        
        $authorRole->givePermissionTo(['files.*',
        'places.*',
        'post.*']);
        
        $name  = config('admin.name');
        $admin = User::where('name', $name)->first();
        $admin->assignRole('admin');
        
    }
}