<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'members';
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

    public function membersDetail($id)
    {
        return $this->db->table('members_detail')->where('id', $id)->get()->getFirstRow();
    }

    public function membersFamilies($id)
    {
        return $this->db->table('members_families')->where('id', $id)->get()->getResultObject();
    }

    public function membersChildren($id)
    {
        return $this->db->table('members_children')->where('id', $id)->get()->getResultObject();
    }

    //data table
    protected $memebersParents = "members_parents";
    protected $column_order = array('id', 'nama', 'ortu1', 'ortu2', 'ortu3'); //urut sesuai dengan kolom pada view jumlah sesuai dengan <th></th>
    protected $column_search = array('nama');
    protected $dt;

    private function _filterQuery()
    {
        $this->dt = $this->db->table($this->memebersParents);
        return $this;
    }

    private function _get_datatables_query()
    {
        $this->_filterQuery();
        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) {
                    $this->dt->groupStart(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->dt->like($item, $_POST['search']['value']);
                } else {
                    $this->dt->orLike($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            // here order processing
            $this->dt->orderBy($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->dt->orderBy('id', 'desc');
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->dt->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->dt->get();
        return $query->getResult();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->dt->countAllResults();
    }

    public function count_all()
    {
        $tbl_storage = $this->_filterQuery();
        return $tbl_storage->countAllResults();
    }
}
