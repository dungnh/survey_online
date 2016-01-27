<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Admin\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permission = array("groupuser_create",
                  "groupuser_update",
                  "groupuser_delete",
                  "user_create",
                  "user_update",
                  "user_delete",
                  "languages_create",
                  "languages_update",
                  "languages_delete",
                  "config_create",
                  "config_update",
                  "config_delete",
                  "module_create",
                  "module_update",
                  "module_delete",
                  "survey_create",
                  "survey_update",
                  "survey_delete",
              );

        DB::table('permissions')->truncate();
        foreach ($permission as $key => $value) {
            Permission::create([
                'id'         => $key+=1,
                'permission_title'         => $value,
                'permission_slug'          => $value,
                'permission_description'   => ''
            ]);
        }
    }
}
