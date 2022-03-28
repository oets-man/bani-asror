<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChildModel;

class Child extends BaseController
{
    public function __construct()
    {
        $this->child = new ChildModel();
    }
    public function index()
    {
        //
    }
    public function delete()
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id = $this->request->getPost('id');
        try {
            $this->child->delete($id);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }
        return json_encode([
            'success' => true,
            'message' => 'Anak berhasil dihapus'
        ]);
    }

    function save($id = null)
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        if (!$id) {
            //insert
            $data = [
                'id_member' => $this->request->getPost('id_member'),
                'id_family' => $this->request->getPost('id_family'),
            ];
            $this->child->insert($data);
            return json_encode([
                'success' => true,
                'message' => 'Anak berhasil ditambahkan'
            ]);
        }
    }
}
