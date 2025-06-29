<?php

namespace App\Models;

use CodeIgniter\Model;

class JaksaSidangModel extends Model
{
    protected $table            = 'jaksa_sidang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id',
        'jadwal_sidang_id',
        'jaksa_id',
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getJaksaSidangBySidangIds(array $sidangIds): array
    {
        $query = $this->orderBy('jadwal_sidang_id', 'DESC');

        $builder = $this->select('jaksa_sidang.jadwal_sidang_id, jaksa.nama, jaksa_sidang.jaksa_id')
                        ->join('jaksa', 'jaksa.id = jaksa_sidang.jaksa_id')
                        ->whereIn('jaksa_sidang.jadwal_sidang_id', $sidangIds);

        $result = $builder->findAll();

        $map = [];
        foreach ($result as $row) {
            $map[$row['jadwal_sidang_id']][] = $row['nama'];
        }

        return $map;
    }
}
