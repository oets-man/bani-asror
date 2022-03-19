<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChildModel;

class Child extends BaseController
{
    public function __construct()
    {
        $this->model = new ChildModel();
    }
    public function index()
    {
        //
    }
    public function delete()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getPost('id');
            $this->model->delete($id);
            return json_encode(true);
        }
        return json_encode(false);
    }

    function save($id = null)
    {
        $data = $this->request->getPost();
        // dd($data['id_family']);
        if (!$data) return redirect()->back();
        if (!$id) {
            //save
            $countIns = 0;
            for ($i = 0; $i < count($data['id_family']); $i++) {
                $this->model->insert([
                    'id_member' => $data['id_member'][$i],
                    'id_family' => $data['id_family'][$i],
                ]);
                // if ($this->db->affectedRows() > 0) {
                //     $countIns++;
                // }
            }
        }
        return redirect()->to(site_url('family/') . $data['id_family'][0]);
    }
}
