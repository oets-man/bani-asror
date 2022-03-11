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
        $id = $id ? $id : 1;
        $keluarga =        $this->model->keluargaDetail($id);
        // dd($keluarga);
        $data = [
            'title'         => 'Keluarga',
            'header'        => 'Keluarga',
            'data'          => $this->model->keluargaDetail($id),
            'provinsi'      => $this->alamat->getProvinsi()->getResult(),
            'kabupaten'     => $this->alamat->getKabupaten($keluarga->id_prov)->getResult(),
            'kecamatan'     => $this->alamat->getKecamatan($keluarga->id_kab)->getResult(),
            'desa'          => $this->alamat->getDesa($keluarga->id_kec)->getResult(),
        ];
        return view('keluarga/index', $data);
    }
    public function update()
    {
        $data = $this->request->getPost();
        // dd($data);
        $data = array_filter($data);

        $this->model->save($data);
        return redirect()->back();
    }
}
