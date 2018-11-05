<?php

namespace App\Http\Controllers\Admin;

use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAccountController extends AdminBaseController
{
    protected $admin;
    public function __construct(AdminService $adminService)
    {
        parent::__construct();
        $this->admin = $adminService;
    }

    public function index(Request $request){
        $params = $request->only('username', 'email', 'phone', 'name', 'active');
        $data = $this->admin->search($params);
        debug($data);
        return view('admin.account.index')->with('data', $data);
    }

    public function getCreate($id = 0){
        $data = [];
        return view('admin.account.edit')->with('data', $data);
    }

    public function postCreate($id = 0){

    }

}
