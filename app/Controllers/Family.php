<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatModel;
use App\Models\FamilyModel;

class Family extends BaseController
{
    public function __construct()
    {
        $this->model = new FamilyModel();
        $this->alamat = new AlamatModel;
    }

    public function index($id = null)
    {

        if (is_null($id)) return false;

        if ($id !== 'new') {
            $keluarga   = $this->model->familiesDetail($id);
            $keluarga->new = false;
            $provinsi   = $this->alamat->getProvinsi()->getResult();
            $kabupaten  = $this->alamat->getKabupaten($keluarga->id_prov)->getResult();
            $kecamatan  = $this->alamat->getKecamatan($keluarga->id_kab)->getResult();
            $desa       = $this->alamat->getDesa($keluarga->id_kec)->getResult();
            // dd($keluarga);
        } else {
            $keluarga   = [
                'id' => null,
                'id_suami' => null,
                'id_istri' => null,
                'suami' => null,
                'istri' => null,
                'tgl_nikah' => null,
                'cerai' => null,
                'id_prov' => null,
                'id_kab' => null,
                'id_kec' => null,
                'desa' => null,
                'jl' => null,
                'new' => true,
            ];
            $keluarga = (object) $keluarga;
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
        // dd($data);
        return view('family/index', $data);
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
