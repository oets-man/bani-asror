<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MemberModel;

class Member extends BaseController
{
    public function __construct()
    {
        $this->model = new MemberModel();
    }

    public function index($id = null)
    {
        // dd(site_url());
        $id = isset($id) ? $id : 0;

        //set session
        session()->set(['lastMemberID' => $id]);
        $member = $this->model->membersDetail($id);
        if ($member->lp == 'L') {
            $member->avatar = $member->avatar ?: 'male.svg';
        } elseif ($member->lp == 'P') {
            $member->avatar = $member->avatar ?: 'female.svg';
        }

        $data = [
            'title' => 'Data Anggota',
            'data' => $member,
            'keluarga' => $this->model->membersFamilies($id),
            'anak' => $this->model->membersChildren($id),
        ];
        return view('member/index', $data);
    }

    public function save($id = null)
    {
        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $data = array_filter($this->request->getPost());
        if (!$id) {
            //insert
            $this->model->insert($data);
            $newID = $this->model->getInsertID();
            $member = $this->model->find($newID);
            if ($member['lp'] == 'L') {
                $avatar = $member['avatar'] ?: 'male.svg';
            } elseif ($member['lp'] == 'P') {
                $avatar = $member['avatar'] ?: 'female.svg';
            }
            $data = [
                'id' => $newID,
                'nama' => $member['nama'],
                'lp' => $member['lp'],
                'avatar' => $avatar,
            ];
            $errors = null;
            $message = 'Data baru berhasil ditambahkan.';
        } else {
            $data = [];
            $errors = [];
            $message = null;
        }
        $response = ['data' => $data, 'message' => $message, 'errors' => $errors, 'csrf_token' => csrf_hash()];
        echo json_encode($response);
    }
}
