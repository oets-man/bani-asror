<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatModel;
use App\Models\KeluargaModel;
use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class Keluarga extends BaseController
{
    public function __construct()
    {
        $this->model = new KeluargaModel();
        $this->alamat = new AlamatModel;
    }

    public function index($id = null)
    {
        if (!is_null($id)) {
            $keluarga   = $this->model->keluargaDetail($id);
            $provinsi   = $this->alamat->getProvinsi()->getResult();
            $kabupaten  = $this->alamat->getKabupaten($keluarga->id_prov)->getResult();
            $kecamatan  = $this->alamat->getKecamatan($keluarga->id_kab)->getResult();
            $desa       = $this->alamat->getDesa($keluarga->id_kec)->getResult();
        } else {
            $keluarga   = [];
            $provinsi   = $this->alamat->getProvinsi()->getResult();
            $kabupaten  = [];
            $kecamatan  = [];
            $desa       = [];
        }

        $data = [
            'title'         => 'Keluarga',
            'header'        => 'Keluarga',
            'data'          => $keluarga,
            'provinsi'      => $provinsi,
            'kabupaten'     => $kabupaten,
            'kecamatan'     => $kecamatan,
            'desa'          => $desa,
        ];
        return view('keluarga/index', $data);
    }
    public function update()
    {
        $data = $this->request->getPost();
        // d($data);
        $data['id_suami'] = strlen($data['id_suami']) !== 0 ? intval($data['id_suami']) :  NULL;
        $data['id_istri'] = strlen($data['id_istri']) !== 0 ? intval($data['id_istri']) :  NULL;

        $data['id_prov'] = strlen($data['id_prov']) !== 0 ? strval($data['id_prov']) :  NULL;
        $data['id_kab'] = strlen($data['id_kab']) !== 0 ? strval($data['id_kab']) :  NULL;
        $data['id_kec'] = strlen($data['id_kec']) !== 0 ? strval($data['id_kec']) :  NULL;

        // d($data);
        // dd($data);

        $this->model->save($data);
        return redirect()->back();
    }
}
