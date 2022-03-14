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
            'title' => 'Anggota',
            'header' => 'Data Anggota',
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

        //get from suami, istri ,anak
        $member_add = isset($data['member_add']) ? $data['member_add'] : null;
        if (isset($data['member_add'])) {
            unset($data['member_add']);
        }

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
                'member_add' => $member_add,
            ];
            $errors = null;
            $message = 'Data baru berhasil ditambahkan.';
        } else {
            //update
            $data = [];
            $errors = [];
            $message = null;
        }
        $response = ['data' => $data, 'message' => $message, 'errors' => $errors, 'csrf_token' => csrf_hash()];
        echo json_encode($response);
    }
}
