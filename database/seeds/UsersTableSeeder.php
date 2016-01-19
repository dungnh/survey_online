<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin\User;
use App\Admin\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->truncate();
        $user = DB::table('users')->insert([
            'id'            => 1,
            'name'          => 'admin',
            'email'          => 'admin@admin.io',
            'password'          => Hash::make('admin'),
            'created_at' => Carbon\Carbon::now(),
            'updated_at' => Carbon\Carbon::now(),
        ]);


        DB::table('role_user')->truncate();
        $role_user = DB::table('role_user')->insert([
                'id' => 1,
                'role_id' => 1,
                'user_id' => 1,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
        ]);


        $permission = Permission::lists('id');
        DB::table('permission_role')->truncate();
        foreach ($permission as $key => $value) {
            DB::table('permission_role')->insert([
                'id' => $key + 1,
                'role_id' => 1,
                'permission_id' => $value,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
        }
    }
}
