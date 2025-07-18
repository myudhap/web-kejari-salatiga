<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;
use App\Models\UserModel;

use function Config\validate_input;

class User extends BaseController
{
    protected $data;
    protected $model;

    public function __construct()
    {
        $this->data = [
            "title" => "User"
        ];
        $this->model = new UserModel();
    }

    public function index()
    {
        $this->data['subtitle'] = "List User";
        //pagination
        $page = (int) ($this->request->getVar('page') ?? 1);
        $limit = (int) ($this->request->getVar('limit') ?? 5);
        $offset = ($page - 1) * $limit;

        $this->data['users'] = $this->model->select(['users.*', 'roles.name as role'])->join('roles', 'roles.id = users.role_id')->findAll($limit, $offset);

        $this->data['total'] = $this->model->countAll();
        $this->data['page'] = $page;
        $this->data['limit'] = $limit;

        $roleModel = new RoleModel();
        $this->data['roles'] = $roleModel->findAll();

        return view('admin/user/list_user', $this->data);
    }

    public function store()
    { 
        $rules = [
            'username'         => 'required|min_length[3]|is_unique[users.username]',
            'name'             => 'required|min_length[3]',
            'role_id'          => 'required',
            'password'         => 'required|min_length[6]',
            'confirm_password' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(["name", "username", "password", "role_id"]);
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        if($this->model->insert($data)) {
            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        }

        return redirect()->back()->with("errors", "Gagal menambahkan data user");
    }

    public function update($id)
    {
        $rules = [
            "username" => "required|min_length[3]|is_unique[users.username, id, {$id}]",
            "name" => 'required|min_length[3]',
            "role_id" => 'required'
        ];

        $password = $this->request->getPost("password");
        $confirm = $this->request->getPost("confirm_password");

        if ($password || $confirm) {
            $rules['password'] = 'required|min_length[6]';
            $rules['confirm_password'] = 'required|matches[password]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost(["name", "username", "role_id"]);
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if($this->model->update($id, $data)) {
            return redirect()->back()->with('success', 'User berhasil diupdate.');
        }

        return redirect()->back()->with("error", "Gagal update data user");
    }
    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->back();
    }
}
