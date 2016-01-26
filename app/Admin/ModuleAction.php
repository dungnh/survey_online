<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ModuleAction extends Model
{
    protected $table = 'module_actions';
    public $timestamps = false;
    protected $fillable = ['module_id', 'action_key'];

    /**
     * ModuleAction hasOne Module
     *
     * @return Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function modules()
    {
        return $this->hasOne('App\Admin\Module');
    }
}
