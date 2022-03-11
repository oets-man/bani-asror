<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Bani extends BaseController
{
    public function __construct()
    {
        $this->model = new AnggotaModel();
    }

    public function index($id = null)
    {
        $id = isset($id) ? $id : 0;
        $data = [
            'title' => 'Data Anggota',
            'data' => $this->model->anggotaDetail($id),
            'keluarga' => $this->model->anggotaKeluarga($id),
            'anak' => $this->model->anggotaAnak($id),
        ];
        return view('anggota/index', $data);
    }

    public function add($id = null)
    {
        $this->model->save($this->request->getPost());
        return redirect()->back();
    }
}
