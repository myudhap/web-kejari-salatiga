<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'name' => 'Super Admin'
        ];

        $this->db->query('INSERT INTO roles (id, name) VALUES(:id:, :name:)', $data);

        $this->db->table('roles')->insert($data);
    }
}
