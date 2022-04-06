<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ChildModel;
use App\Models\FamilyModel;
use App\Models\MemberModel;
use Config\Services;

class Member extends BaseController
{
    public function __construct()
    {
        $this->member = new MemberModel();
        $this->family = new FamilyModel();
        $this->child = new ChildModel();
        $this->urlAvatar = 'assets/images/avatars/';
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
            $member->avatar = $member->avatar ?: 'male-grey.svg';
        } elseif ($member->lp == 'P') {
            $member->avatar = $member->avatar ?: 'female-grey.svg';
        }

        $data = [
            'title' => 'Anggota',
            'header' => 'Data Anggota',
            'member' => $member,
            'keluarga' => $this->member->membersFamilies($id),
            'anak' => $this->member->membersChildren($id),
        ];
        return view('member/index', $data);
    }

    public function test()
    {
        echo json_encode($this->request->getFiles());
    }

    public function avatar()
    {
        // d($this->request->getPost());
        // dd($this->request->getFile('avatar'));
        // echo json_encode($this->request->getFile('avatar'));
        // exit;
        $id = $this->request->getPost('id');
        if (!$this->validate([
            'avatar' => [
                'label'  => 'Gambar',
                'rules'  => 'uploaded[avatar]|max_size[avatar,1024]|is_image[avatar]',
                'errors' => [
                    'uploaded' => 'Silakan pilih gambar.',
                    'max_size' => 'Ukuran file terlalu besar (maks. 1 MB).',
                    'is_image' => 'Berkas yang dipilih tidak didukung.'
                ]
            ]
        ])) {
            $validation =  \Config\Services::validation();
            return $validation->listErrors();
            // echo json_encode($validation->getErrors());
            // exit;
        }

        try {
            //upload avatar baru
            $avatar = $this->request->getFile('avatar');
            $name = $avatar->getRandomName();
            $avatar->move($this->urlAvatar, $name);

            //hapus avatar lama
            $file = $this->member->find($id);
            unlink($this->urlAvatar . $file['avatar']);
        } catch (\Throwable $th) {
            // throw $th->getMessage();
            // echo json_encode($th->getMessage());
            // exit;
        }

        //update db
        $update = $this->member->update($id, ['avatar' => $name]);
        if (!$update)  return 'error';
        return redirect()->back();
        // echo json_encode(['succuss' => true]);
    }

    public function save()
    {
        // terima dari view modal edit
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
            $errors = $this->member->errors();
            if ($errors) {
                return json_encode([
                    'success' => false,
                    'message' => $this->member->errors(),
                ]);
            }

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
                $this->member->update($data['id'], $data);
                $errors = $this->member->errors();
                if ($errors) {
                    $response = [
                        'success' => false,
                        'message' => $errors,
                    ];
                } else {
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

    public function find()
    {
        if (!$this->request->isAJAX()) return exit('Maaf, tidak dapat diproses.');
        $id = $this->request->getPost('id');
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
            //hapus file foto
            $data = $this->member->find($id);
            unlink($this->urlAvatar . $data['avatar']);
            //code...
        } catch (\Throwable $th) {
        }

        try {
            //delete db
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

    public function membersParents($req = null)
    {
        // d($this->request->getPost());
        $request = Services::request();
        if (!$request->getPost()) return exit("Akses ditolak");

        $lists = $this->member->get_datatables();
        $data = [];
        $no = $request->getPost("start");

        foreach ($lists as $list) {
            $tombolSet = "<button type='button' class='btn btn-outline-primary btn-sm' onclick='setMember($list->id)'><i class='fa-solid fa-circle-check'></i></button>";
            $nama = $list->nama;
            if (!$req) {
                $tombolSet = "<button type='button' class='btn btn-outline-secondary btn-sm' disabled><i class='fa-solid fa-circle-check'></i></button>";
                $nama = anchor(site_url('member/') . $list->id, $list->nama);
            }

            $row = [];
            $row[] = $tombolSet;
            $row[] = $nama;
            $row[] = $list->ortu1;
            $row[] = $list->ortu2;
            $row[] = $list->ortu3;
            $data[] = $row;
        }
        $output = [
            "draw" => $request->getPost('draw'),
            "recordsTotal" => $this->member->count_all(),
            "recordsFiltered" => $this->member->count_filtered(),
            "data" => $data,
            csrf_token() => csrf_hash()
        ];

        return json_encode($output);
    }
}
