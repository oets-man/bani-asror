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
        $this->family = new FamilyModel();
        $this->alamat = new AlamatModel;
        $this->child = new ChildModel();
        $this->member = new MemberModel();
    }

    public function index($id = null)
    {

        if (is_null($id)) return exit('ID not found');
        session()->set(['lastFamilyID' => $id]);

        $family = $this->family->familiesDetail($id);
        if (!$family) return "Not found family $id";

        $family->avatar_suami = $family->avatar_suami ?: 'male-grey.svg';
        $family->avatar_istri = $family->avatar_istri ?: 'female-grey.svg';
        // dd($family);

        $data = [
            'title'         => 'Keluarga',
            'header'        => 'Data Keluarga',
            'family'        => $family,
            'provinsi'      => $this->alamat->getProvinsi()->getResult(),
            'kabupaten'     => $this->alamat->getKabupaten($family->id_prov)->getResult(),
            'kecamatan'     => $this->alamat->getKecamatan($family->id_kab)->getResult(),
            'desa'          => $this->alamat->getDesa($family->id_kec)->getResult(),
            'child'         => $this->child->childrenFamily($id),
        ];
        return view('family/index', $data);
    }

    public function update($id)
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

        $this->family->update($id, $data);
        return redirect()->to(site_url('family/') . $id);
    }

    public function updatePasangan($req)
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id_member = $this->request->getPost('id_member');
        $id_family = $this->request->getPost('id_family');

        if ($req == 'suami') {
            $cek = $this->member->where(['id' => $id_member, 'lp' => 'P'])->first();
            if ($cek) {
                return json_encode([
                    'success' => false,
                    'message' => "Lho... Suami kok cewek!?"
                ]);
            }
            $this->family->update($id_family, ['id_suami' => $id_member]);
        } else if ($req == 'istri') {
            $cek = $this->member->where(['id' => $id_member, 'lp' => 'L'])->first();
            if ($cek) {
                return json_encode([
                    'success' => false,
                    'message' => "Lho... Istri kok cowok!?"
                ]);
            }
            $this->family->update($id_family, ['id_istri' => $id_member]);
        }
        $req = ucfirst($req);
        return json_encode([
            'success' => true,
            'message' => "$req berhasil diupdate"
        ]);
    }

    public function deletePasangan($req)
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id = $this->request->getPost('id');

        $req = strtolower($req);

        try {
            if ($req == 'suami') {
                $this->family->update($id, ['id_suami' => NULL]);
            } else if ($req == 'istri') {
                $this->family->update($id, ['id_istri' => NULL]);
            }
        } catch (\Throwable $th) {
            return json_encode([
                'success' => false,
                'message' => "Aksi tidak dapat dilaksanakan"
            ]);
        }
        $req = ucfirst($req);
        return json_encode([
            'success' => true,
            'message' => "$req berhasil dihapus"
        ]);
    }

    public function delete()
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id = $this->request->getPost('id');
        try {
            $this->family->delete($id);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }
        return json_encode([
            'success' => true,
            'message' => 'Keluarga berhasil dihapus'
        ]);
        // $lastMemberID = session()->lastMemberID;
        // return redirect()->to(site_url('member/index/') . $lastMemberID);
    }

    public function new()
    {
        //terima ajax dari halaman member
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id = $this->request->getPost('id');
        $lp = strtolower($this->request->getPost('lp'));
        if ($lp == 'l') {
            //buat suami
            $this->family->insert(['id_suami' => $id]);
            $id_family = $this->family->getInsertID();
        } elseif ($lp == 'p') {
            //buat istri
            $this->family->insert(['id_istri' => $id]);
            $id_family = $this->family->getInsertID();
        }
        $response = [
            'errors' => null,
            'message' => 'Keluarga baru berhasil dibuat',
            'id_family' => $id_family
        ];
        return json_encode($response);
    }
}
