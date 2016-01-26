<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public $timestamps = false;
    protected $table = 'surveys';
    protected $fillable = ['id', 'user_id', 'content'];
}
