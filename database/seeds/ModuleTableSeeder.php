<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $modules = array(
          0 => array(
            "name" => "Management Group user",
            "route_key" => "groupuser"
          ),
          1 => array(
            "name" => "Management User",
            "route_key" => "user"
          ),
          2 => array(
            "name" => "Management Language",
            "route_key" => "languages"
          ),
          3 => array(
            "name" => "Management Module",
            "route_key" => "module"
          ),
          4 => array(
            "name" => "Management Survey",
            "route_key" => "survey"
          ),

        );

        DB::table('modules')->truncate();
        foreach ($modules as $key => $value) {
            DB::table('modules')->insert([
                'id' => $key + 1,
                'name' => $value['name'],
                'route_key' => $value['route_key'],
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
            ]);
        }
    }
}
