<?php

namespace app;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements
    AuthenticatableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | ACL Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Checks a Permission.
     *
     * @param  String permission Slug of a permission (i.e: manage_user)
     *
     * @return Boolean true if has permission, otherwise false
     */
    public function can($permission = null)
    {
        $array_permission = explode('|', $permission);

        return !is_null($permission) && $this->checkPermission($array_permission);
    }

    /**
     * Check if the permission matches with any permission user has.
     *
     * @param  String permission slug of a permission
     *
     * @return Boolean true if permission exists, otherwise false
     */
    protected function checkPermission($perm)
    {
        $permissions = $this->getAllPernissionsFormAllRoles();
        // dd($permissions);
        $permissionArray = is_array($perm) ? $perm : [$perm];

        return count(array_intersect($permissions, $permissionArray));
    }

    /**
     * Get all permission slugs from all permissions of all roles.
     *
     * @return Array of permission slugs
     */
    protected function getAllPernissionsFormAllRoles()
    {
        $permissionsArray = [];
        $permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

            return array_fetch($permission, 'permission_slug');

        }, $permissions))));
    }
    /**
     * Get all access module from all permissions of all roles.
     *
     * @return Array of permission slugs
     */
    public function hasAccess()
    {
        $permissionsArray = [];
        $permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();

        return array_map('strtolower', array_unique(array_flatten(array_map(function ($permission) {

            return array_fetch($permission, 'permission_slug');

        }, $permissions))));
    }
    /*
    |--------------------------------------------------------------------------
    | Relationship Methods
    |--------------------------------------------------------------------------
    */

    /**
     * Many-To-Many Relationship Method for accessing the User->roles.
     *
     * @return QueryBuilder Object
     */
    public function roles()
    {
        return $this->belongsToMany('App\Admin\Role');
    }
}
