<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Home extends BaseController
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

    public function add()
    {
        return 'OK';
    }


    public function welcome()
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
