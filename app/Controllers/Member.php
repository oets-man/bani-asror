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
        // dd(site_url());
        $id = isset($id) ? $id : 0;

        //set session
        session()->set(['lastMemberID' => $id]);
        $member = $this->member->membersDetail($id);
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
        $response = [
            'success' => null,
            'errors' => null,
            'message' => null,
        ];

        // dd($this->request->getPost());

        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $data = array_filter($this->request->getPost());

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
        $isNew = isset($data['id']) ? false : true;
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
            }
            $response = [
                'success' => true,
                'message' => $message,
            ];
        } else {
            //update member
            $member = $this->member->find($data['id']);
            if ($member) {
                $saveMember = $this->member->save($data);
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

    public function modal($id = null) //gagal
    {
        if (!$id) {
            $data = ['data' => $this->request->getPost()];
            return view('member/modal', $data);
        }
    }
    public function find($id)
    {
        $response = [
            'errors' => null,
            'message' => null,
            'data' => null,
            'csrf_token' => csrf_hash(),
        ];
        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $data = $this->member->find($id);
        if ($data) {
            $response['data'] = $data;
        }
        echo json_encode($response);
    }
}
