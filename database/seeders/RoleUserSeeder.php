<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::all();

        

        User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(1)->pluck('id')
            );
        });
        
        $role_admin = Role::where('id', '1')->first();
        $role_user = Role::where('id', '3')->first();
        
        $admin = new User();
        $admin->name = 'Dom';
        $admin->email = 'boraoudom2811@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'DROSE';
        $user->email = 'boraoudom1234@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
