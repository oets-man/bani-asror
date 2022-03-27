<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChildModel;
use App\Models\FamilyModel;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {
        $this->member = new MemberModel();
        $this->family = new FamilyModel();
        $this->child = new ChildModel();
    }

    public function index($id = null)
    {
        // redirect ke id user
        $id = isset($id) ? $id : 0;

        //set session
        session()->set(['lastMemberID' => $id]);
        $member = $this->member->membersDetail($id);

        //perlu message not found
        if (!$member) return redirect()->back();

        if ($member->lp == 'L') {
            $member->avatar = $member->avatar ?: 'male.svg';
        } elseif ($member->lp == 'P') {
            $member->avatar = $member->avatar ?: 'female.svg';
        }

        $data = [
            'title' => 'Anggota',
            'header' => 'Data Anggota',
            'data' => $member,
            'keluarga' => $this->member->membersFamilies($id),
            'anak' => $this->member->membersChildren($id),
        ];
        return view('member/index', $data);
    }

    public function save()
    {
        // dd($this->request->getPost());

        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $data = $this->request->getPost();

        //get from suami, istri, anak
        if (isset($data['member_add'])) {
            $member_add = $data['member_add'];
            unset($data['member_add']);
        }

        $id_family = null;
        if (isset($data['id_family'])) {
            $id_family = $data['id_family'];
            unset($data['id_family']);
        }

        $data['wafat_muda'] = isset($data['wafat_muda']) ? 'Y' : 'N';
        $data['tgl_lahir'] = strlen($data['tgl_lahir']) !== 0 ? $data['tgl_lahir'] :  NULL;
        $data['tgl_wafat'] = strlen($data['tgl_wafat']) !== 0 ? $data['tgl_wafat'] :  NULL;
        // echo json_encode($data);
        // exit;
        $isNew = is_numeric($data['id']) ? false : true;
        if ($isNew) {
            //insert member
            $this->member->insert($data);
            $newID = $this->member->getInsertID();
            if ($member_add == 'a') {
                //insert child
                $insertChild = [
                    'id_member' => $newID,
                    'id_family' => $id_family
                ];
                $save = $this->child->save($insertChild);
                if ($save) {
                    $message = 'Anak berhasil ditambahkan.';
                }
            } elseif ($member_add == 's') {
                $ins = ['id' => $id_family, 'id_suami' => $newID];
                $save = $this->family->save($ins);
                if ($save) {
                    $message = 'Suami berhasil ditambahkan.';
                }
            } elseif ($member_add == 'i') {
                $ins = ['id' => $id_family, 'id_istri' => $newID];
                $save = $this->family->save($ins);
                if ($save) {
                    $message = 'Istri berhasil ditambahkan.';
                }
            }
            $response = [
                'success' => true,
                'message' => $message
            ];
        } else {
            //update member
            $member = $this->member->find($data['id']);
            if ($member) {
                $saveMember = $this->member->update($data['id'], $data);
                if ($saveMember) {
                    $message = 'Data berhasil diupdate.';
                    $response = [
                        'success' => true,
                        'message' => $message,
                    ];
                }
            }
        }
        // $response = ['data' => $data, 'message' => $message, 'errors' => $errors, 'csrf_token' => csrf_hash()];
        echo json_encode($response);
    }

    public function find($id)
    {
        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $response = [
            'errors' => null,
            'message' => null,
            'data' => null,
            'csrf_token' => csrf_hash(),
        ];
        $data = $this->member->find($id);
        if ($data) {
            $response['data'] = $data;
        }
        echo json_encode($response);
    }

    public function delete()
    {
        if (!$this->request->isAJAX()) return exit('Tidak dapat diproses');
        $id = $this->request->getPost('id');
        try {
            $this->member->delete($id);
        } catch (\Throwable $th) {
            $th->getMessage();
            return redirect()->back();
        }
        return json_encode([
            'success' => true,
            'message' => 'Anggota berhasil dihapus'
        ]);
    }
}
