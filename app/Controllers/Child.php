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

    public function save($id = null)
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
    public function saveAll()
    {
        if (!$this->request->getPost()) return exit('Tidak dapat diproses');

        $id = $this->request->getPost('id');
        $urut = $this->request->getPost('urut');
        for ($i = 0; $i < count($id); $i++) {
            $u = strlen($urut[$i]) !== 0 ? intval($urut[$i]) : NULL;
            $this->child->update($id[$i], ['urut' => $u]);
        }
        return redirect()->back();
    }
}
