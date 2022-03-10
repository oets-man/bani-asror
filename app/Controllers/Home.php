<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Home extends BaseController
{
    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }

    public function index($id = null)
    {
        $id = isset($id) ? $id : 0;
        $data = [
            'title' => 'Data Anggota',
            'data' => $this->anggotaModel->anggotaDetail($id),
            'keluarga' => $this->anggotaModel->anggotaKeluarga($id),
            'anak' => $this->anggotaModel->anggotaAnak($id),
        ];
        return view('anggota/index', $data);
    }

    public function index1()
    {
        return view('welcome_message');
    }
    public function template()
    {

        return view('layout/template');
    }

    public function dashboard()
    {
        $data = [
            'title' => 'Dashboard',
            'data' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati doloribus, eligendi magni fugit temporibus quo atque id dignissimos incidunt mollitia quos ratione placeat cumque eos quasi neque rerum, minima rem.'
        ];
        return view('index', $data);
    }
}
