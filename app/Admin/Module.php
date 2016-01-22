<?php

namespace app\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Admin\ModuleAction;

class Module extends Model
{
    protected $table = 'modules';
    public $timestamps = false;
    protected $fillable = ['name', 'route_key'];

    /**
     * Module hasMany ModuleAction.
     *
     * @return Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function actions()
    {
        return $this->hasMany('App\Admin\ModuleAction');
    }

    /**
     * Save data
     *
     * @param Request $request   Request
     * @param ID      $module_id Module id
     *
     * @return boolean
     */
    public function saveData($request, $module_id = '')
    {
        if ($module_id) {
            $modules = self::find($module_id);
            $modules->actions()->delete();
        } else {
            $modules = new self();
        }
        $modules->name = $request->input('name');
        $modules->route_key = $request->input('route_key');
        $results = $modules->save();
        $actions = [];
        if ($request->input('module_action')) {
            foreach ($request->input('module_action') as $key => $module_action) {
                array_push($actions, ModuleAction::firstOrNew(['module_id' => $modules->id,
                                                            'action_key' => $module_action, ]));
            }
        }
        if ($results) {
            $modules->actions()->saveMany($actions);
        }

        return $results;
    }

    /**
     * Delete data
     *
     * @param Int $module_id Module id
     *
     * @return boolean
     */
    public function deleteData($module_id)
    {
        $modules = self::find($module_id);
        $modules->actions()->delete();

        return $modules->delete();
    }
}
