<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11/5/2018
 * Time: 10:24 PM
 */

namespace App\Services;


use App\Models\GroupPermission;
use App\Models\Permission;
use Exception;
use Illuminate\Support\Facades\DB;

class PermissionService
{
    private $group;
    private $permission;
    public function __construct(GroupPermission $groupPermission, Permission $permission)
    {
        $this->group = $groupPermission;
        $this->permission = $permission;
    }

    public function getAll(){
        $group = $this->group->all(['id','name']);
        if(sizeof($group) > 0){
            foreach($group as $v){
                $v->permission;
            }
        }
        return $group;
    }

}