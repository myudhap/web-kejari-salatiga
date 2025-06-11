<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new \App\Models\UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $model->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'name' => $user['name'],
                'role_id' => $user['role_id'],
                'logged_in' => true
            ]);
            return redirect()->to('/panel');
        } else {
            return redirect()->back()->with('error', 'Username atau Password salah');
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/panel/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function registerStore()
    {
        $model = new UserModel();

        $data = [
            'name'     => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'  => 2 // 1 untuk admin, 2 untuk user biasa
        ];

        $model->insert($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    
}
// app/Controllers/Dashboard.php

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        echo "Halo, " . session()->get('username') . "! Kamu berhasil login.";
        echo "<br><a href='/logout'>Logout</a>";
    }
}
