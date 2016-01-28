<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ModuleActionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('module_actions')->truncate();
        $modules = DB::table('modules')->select('id')->get();
        $action_configs = \Config::get('action');
        for ($i = 0; $i < count($modules); $i++) {
            foreach (array_keys($action_configs) as $action_key => $action) {
               DB::table('module_actions')->insert([
                  'module_id' => $modules[$i]->id,
                  'action_key' => $action,
                  'created_at' => 0,
                  'updated_at' => 0,
              ]); 
            }
        }
    }
}
