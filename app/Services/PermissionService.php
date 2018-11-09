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

    public function getGroupById($id){
        $group = $this->group->find($id);
        $group->permission;
        return $group;
    }

    public function createPermission($data)
    {
        try {
            DB::beginTransaction();
            $permission = $this->permission;
            foreach ($data as $key => $value) {
                $permission->$key = $value;
            }
            $permission->save();
            DB::commit();
            return $permission;
        } catch (Exception  $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updatePermission($id, $data)
    {
        try {
            DB::beginTransaction();
            $permission = $this->permission->find($id);
            foreach ($data as $key => $value) {
                $permission->$key = $value;
            }
            $permission->save();
            DB::commit();
            return $permission;
        } catch (Exception  $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function removePermission($id)
    {
        try {
            DB::beginTransaction();
            $permission = $this->permission->find($id)->delete();
            DB::commit();
            return true;
        } catch (Exception  $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getPermissionByGroupId($id){
        return $this->permission->where('group_id', $id)->get();
    }

}