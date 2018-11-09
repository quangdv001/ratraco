<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AccountRequest;
use App\Services\AdminService;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPermissionController extends AdminBaseController
{
    protected $admin;
    protected $permission;
    public function __construct(AdminService $adminService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->admin = $adminService;
        $this->permission = $permissionService;
    }

    public function index(Request $request){
        $data = $this->permission->getAll();
        return view('admin.permission.index')
            ->with('data', $data);
    }

    public function getCreate($id = 0){
        $data = [];
        if($id > 0){
            $data = $this->permission->getGroupById($id);
        }
        return view('admin.permission.edit')
            ->with('id', $id)
            ->with('data', $data);
    }

    public function postCreate(AccountRequest $request, $id = 0){
        $data = $request->only('username', 'email', 'phone', 'name', 'active');
        $mess = '';
        if($request->filled('password')){
            $data['password'] = bcrypt($request->filled('password'));
        }
        if($request->has('permission')){
            $data['permissions'] = implode(',',$request->input('permission'));
        }
        if($id == 0){
            $res = $this->admin->create($data);
            if($res){
                $mess = 'Tạo tài khoản thành công';
            }
        } else {
            $admin = $this->admin->getById($id);
            $res = $this->admin->update($admin, $data);
            if($res){
                $mess = 'Cập nhật tài khoản thành công';
            }
        }
        return redirect()->route('admin.account.getList')->with('success_message', $mess);
    }

    public function editPermission(Request $request){
        $id = (int)$request->input('id',0);
        $data = $request->only('name', 'code', 'group_id');
        $response['success'] = 0;
        $response['msg'] = 'Lỗi hệ thống';
        $res = array();
        if($id == 0){
            $res = $this->permission->createPermission($data);

        } else {
            $res = $this->permission->updatePermission($id, $data);
        }
        if($res){

            $permission = $this->permission->getPermissionByGroupId($res->group_id);
            $response['success'] = 1;
            $response['msg'] = $id == 0 ? 'Tạo quyền thành công' : 'Sửa quyền thành công';
            $response['html'] = view('admin.permission.listPermission')->with('data', $permission)->render();
        }
        return response()->json($response);
    }

    public function removePermission(Request $request){
        $id = (int)$request->input('id',0);
        $groupId = (int)$request->input('group_id', 0);
        $response['success'] = 0;
        $response['msg'] = 'Lỗi hệ thống';
        $res = array();
        $res = $this->permission->removePermission($id);
        if($res){
            $permission = $this->permission->getPermissionByGroupId($groupId);
            $response['success'] = 1;
            $response['msg'] = 'Xóa quyền thành công';
            $response['html'] = view('admin.permission.listPermission')->with('data', $permission)->render();
        }
        return response()->json($response);
    }

}
