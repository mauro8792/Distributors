<?php

use Illuminate\Database\Seeder;
use Distributor\Role;
use Distributor\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();
        
        $user = new User();
        $user->name = "User";
        $user->lastname = "lastUser";
        $user->email = "user@email.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = "Admin";
        $user->lastname = "lastAdmin";
        $user->email = "admin@email.com";
        $user->password = bcrypt('query');
        $user->save();
        $user->roles()->attach($role_admin);
    }

}
