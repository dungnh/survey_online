<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class ModuleAction extends Model
{
    protected $table = 'module_actions';
    public $timestamps = false;
    protected $fillable = ['module_id', 'action_key'];

    public function modules()
    {
        return $this->hasOne('App\Admin\Module');
    }
}
