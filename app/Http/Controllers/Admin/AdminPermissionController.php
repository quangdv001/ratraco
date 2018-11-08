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
        $params = $request->only('username', 'email', 'phone', 'name', 'active');
        $data = $this->admin->search($params);
        debug($data);
        return view('admin.permission.index')
            ->with('data', $data);
    }

    public function getCreate($id = 0){
        $data = [];
        if($id > 0){
            $data = $this->admin->getById($id);
        }
        $group = $this->permission->getAll();
        debug($group, $data);
        return view('admin.account.edit')
            ->with('id', $id)
            ->with('group', $group)
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

}
