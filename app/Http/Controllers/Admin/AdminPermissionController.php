<?php

namespace App\Http\Controllers\Admin;

use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPermissionController extends AdminBaseController
{
    protected $admin;
    public function __construct(AdminService $adminService)
    {
        parent::__construct();
        $this->admin = $adminService;
    }

    public function index(Request $request){
//        $params = $request->only('username', 'email', 'phone', 'name', 'active');
//        $data = $this->admin->search($params);
        $data = $this->admin->getAll();
        return view('admin.account.index', ['data', $data]);
    }

    public function getCreate($id = 0){
        $data = [];
        if($id > 0){
            $data = $this->admin->getById($id);
        }
        return view('admin.account.edit', ['data', $data]);
    }

    public function postCreate($id = 0, Request $request){
    }

}
