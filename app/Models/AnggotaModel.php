<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'anggota';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

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

    public function anggotaDetail($id)
    {
        return $this->db->table('anggota_detail')->where('id', $id)->get()->getFirstRow();
    }
    public function anggotaKeluarga($id)
    {
        return $this->db->table('anggota_keluarga')->where('id', $id)->get()->getResultObject();
    }
    public function anggotaAnak($id)
    {
        return $this->db->table('anggota_anak')->where('id', $id)->get()->getResultObject();
    }
}
