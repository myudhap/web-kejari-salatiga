<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'username' => 'knsalatigaadmin',
            'name' => 'Admin',
            'password' => 'adminknsalatiga',
            'role_id' => 1,
            'name' => 'Super Admin'
        ];

        $this->db->query('INSERT INTO roles (id, name) VALUES(:id:, :name:)', $data);

        $this->db->table('roles')->insert($data);
    }
}
