<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment() === 'production') {
            exit('I just stopped you getting fired. Love, Amo.');
        }

        DB::table('roles')->truncate();
        
        Role::create([
            'id'            => 1,
            'role_title'          => 'Root',
            'role_slug'          => 'Root',
            'description'   => 'Use this account with extreme caution. When using this account it is possible to cause irreversible damage to the system.'
        ]);

        Role::create([
            'id'            => 2,
            'role_title'          => 'Administrator',
            'role_slug'          => 'Administrator',
            'description'   => 'Full access to create, edit, and update companies, and orders.'
        ]);

        Role::create([
            'id'            => 3,
            'role_title'          => 'Manager',
            'role_slug'          => 'Manager',
            'description'   => 'Ability to create new companies and orders, or edit and update any existing ones.'
        ]);

        Role::create([
            'id'            => 4,
            'role_title'          => 'User',
            'role_slug'          => 'User',
            'description'   => 'A standard user that can have a licence assigned to them. No administrative features.'
        ]);
    }
}
