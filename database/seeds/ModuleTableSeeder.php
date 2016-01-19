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

        $modules = array(0 => array(
            "name" => "Management Static page",
            "route_key" => "staticpage"
          ),
          1 => array(
            "name" => "Management Services",
            "route_key" => "service"
          ),
          2 => array(
            "name" => "Management Timeline",
            "route_key" => "timeline"
          ),
          3 => array(
            "name" => "Management Team",
            "route_key" => "team"
          ),
          4 => array(
            "name" => "Management Member",
            "route_key" => "member"
          ),
          5 => array(
            "name" => "Management Contact",
            "route_key" => "contact"
          ),
          6 => array(
            "name" => "Management Group user",
            "route_key" => "groupuser"
          ),
          7 => array(
            "name" => "Management User",
            "route_key" => "user"
          ),
          8 => array(
            "name" => "Management Language",
            "route_key" => "languages"
          ),
          9 => array(
            "name" => "Management Module",
            "route_key" => "modules"
          ));

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
