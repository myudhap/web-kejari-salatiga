<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "title" => "List User"
        ];
        $this->model = new UserModel();
    }

    public function index()
    {
        $this->data['users'] = $this->model->orderBy("name", "asc")->findAll();
        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->findAll();

        return view('admin/user/ListUserView', $this->data);
    }

    public function store()
    {
        $this->model->save([
            "name" => $this->request->getPost("name"),
            "email" => $this->request->getPost("email"),
            "password" => password_hash($this->request->getPost("password"), PASSWORD_BCRYPT),
            "role_id" => $this->request->getPost("role_id"),
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $this->data['user'] = $this->model->find($id);
        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->findAll();

        return view('admin/user/EditUserView', $this->data);
    }
    public function update($id)
    {
        $this->model->update($id, [
            "name" => $this->request->getPost("name"),
            "email" => $this->request->getPost("email"),
            "role_id" => $this->request->getPost("role_id"),
        ]);

        return redirect()->to(base_url('panel/list-user'));
    }
    public function delete($id)
    {
        $this->model->delete($id);

        return redirect()->to(base_url('panel/list-user'));
    }
}
