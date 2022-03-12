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
        $id = isset($id) ? $id : 0;
        $data = [
            'title' => 'Data Anggota',
            'data' => $this->model->membersDetail($id),
            'keluarga' => $this->model->membersFamilies($id),
            'anak' => $this->model->membersChildren($id),
        ];
        return view('member/index', $data);
    }

    public function add($id = null)
    {
        $this->model->save($this->request->getPost());
        return redirect()->back();
    }
}
