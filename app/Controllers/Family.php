<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlamatModel;
use App\Models\ChildModel;
use App\Models\FamilyModel;
use App\Models\MemberModel;
use PDO;

class Family extends BaseController
{
    public function __construct()
    {
        $this->model = new FamilyModel();
        $this->alamat = new AlamatModel;
        $this->child = new ChildModel();
    }

    public function index($id = null, $p = null)
    {

        if (is_null($id)) return exit('ID not found');
        session()->set(['lastFamilyID' => $id]);

        if (is_null($p)) {
            //not new
            $family   = $this->model->familiesDetail($id);
            if (!$family) return "Not found family $id";

            $family->avatar_suami = $family->avatar_suami ?: 'male.svg';
            $family->avatar_istri = $family->avatar_istri ?: 'female.svg';

            $provinsi   = $this->alamat->getProvinsi()->getResult();
            $kabupaten  = $this->alamat->getKabupaten($family->id_prov)->getResult();
            $kecamatan  = $this->alamat->getKecamatan($family->id_kab)->getResult();
            $desa       = $this->alamat->getDesa($family->id_kec)->getResult();
            $child      = $this->child->childrenFamily($id);

            // dd($family);
        } else {
            // is new
            $member = new MemberModel();
            $member = $member->membersDetail($id);
            if (!$member) return "Not found member $id";
            $family   = [
                'id' => null,
                'id_suami' => null,
                'id_istri' => null,
                'suami' => null,
                'istri' => null,
                'avatar_suami' => 'male.svg',
                'avatar_istri' => 'female.svg',
                'tgl_nikah' => null,
                'cerai' => null,
                'id_prov' => null,
                'id_kab' => null,
                'id_kec' => null,
                'desa' => null,
                'jl' => null,
            ];
            if ($p == 's') {
                $family['id_suami'] = $member->id;
                $family['suami'] = $member->nama;
            } elseif ($p == 'i') {
                $family['id_istri'] = $member->id;
                $family['istri'] = $member->nama;
            } else {
                return "Parameter tidak sesuai";
            }
            $family = (object) $family;
            $provinsi   = $this->alamat->getProvinsi()->getResult();
            $kabupaten  = [];
            $kecamatan  = [];
            $desa       = [];
            $child      = [];
        }

        $data = [
            'title'         => 'Keluarga',
            'header'        => 'Data Keluarga',
            'data'          => $family,
            'provinsi'      => $provinsi,
            'kabupaten'     => $kabupaten,
            'kecamatan'     => $kecamatan,
            'desa'          => $desa,
            'isNew'         => $p ? true : false,
            'child'         => $child,
        ];
        // dd($data);
        return view('family/index', $data);
    }
    public function save($id = null)
    {
        // dd($id);
        $data = $this->request->getPost();
        // dd($data);
        $data['id_suami'] = strlen($data['id_suami']) !== 0 ? intval($data['id_suami']) :  NULL;
        $data['id_istri'] = strlen($data['id_istri']) !== 0 ? intval($data['id_istri']) :  NULL;
        $data['tgl_nikah'] = strlen($data['tgl_nikah']) !== 0 ? $data['tgl_nikah'] :  NULL;
        $data['id_prov'] = strlen($data['id_prov']) !== 0 ? strval($data['id_prov']) :  NULL;
        $data['id_kab'] = strlen($data['id_kab']) !== 0 ? strval($data['id_kab']) :  NULL;
        $data['id_kec'] = strlen($data['id_kec']) !== 0 ? strval($data['id_kec']) :  NULL;

        if ($id) {
            // dd($data);
            $this->model->update($id, $data);
        } else {
            $this->model->insert($data);
            $id = $this->model->getInsertID();
        }
        return redirect()->to(site_url('family/index/') . $id);
    }

    public function delete($id)
    {
        try {
            $this->model->delete($id);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }
        $lastMemberID = session()->lastMemberID;
        return redirect()->to(site_url('member/index/') . $lastMemberID);
    }
}
