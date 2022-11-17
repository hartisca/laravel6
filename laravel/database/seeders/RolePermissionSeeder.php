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

        Permission::create(['name' => 'posts.*']);
        Permission::create(['name' => 'posts.list']);
        Permission::create(['name' => 'posts.create']);
        Permission::create(['name' => 'posts.update']);
        Permission::create(['name' => 'posts.read']);
        Permission::create(['name' => 'posts.delete']);

        $adminRole = Role::create(['name' => 'Admin']);
        $editorRole = Role::create(['name' => 'Editor']);
        $authorRole = Role::create(['name' => 'Author']);

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