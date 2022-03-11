<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatModel;

class Alamat extends BaseController
{
    public function __construct()
    {
        $this->model = new AlamatModel;
    }
    public function index()
    {
        if ($this->request->getVar('aksi')) {
            $aksi = $this->request->getVar('aksi');
            if ($aksi == 'getKabupaten') {
                $id = $this->request->getVar('id');
                $data = $this->model->getKabupaten($id)->getResultArray();
                $result = [
                    'csrf_token' => csrf_hash(), //kirim token baru
                    'list' => $data
                ];
                return json_encode($result);
            }

            if ($aksi == 'getKecamatan') {
                $id = $this->request->getVar('id');
                $data = $this->model->getKecamatan($id)->getResultArray();
                $result = [
                    'csrf_token' => csrf_hash(), //kirim token baru
                    'list' => $data
                ];
                return json_encode($result);
            }

            if ($aksi == 'getDesa') {
                $id = $this->request->getVar('id');
                $data = $this->model->getDesa($id)->getResultArray();
                $result = [
                    'csrf_token' => csrf_hash(), //kirim token baru
                    'list' => $data
                ];
                return json_encode($result);
            }
        }
    }
}
