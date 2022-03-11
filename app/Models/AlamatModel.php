<?php

namespace App\Models;

use CodeIgniter\Model;

class AlamatModel extends Model
{
    protected $db;
    protected $tabelProv;
    protected $tabelKab;
    protected $tabelKec;
    protected $tabelDesa;

    public function __construct()
    {
        $this->db = db_connect();
        $this->tabelProv    = $this->db->table('list_provinsi');
        $this->tabelKab     = $this->db->table('list_kabupaten');
        $this->tabelKec     = $this->db->table('list_kecamatan');
        $this->tabelDesa     = $this->db->table('list_desa');
        $this->tabelKotaLahir     = $this->db->table('list_kota_lahir');
    }

    public function getKotaLahir()
    {
        return $this->tabelKotaLahir->get();
    }

    public function getProvinsi()
    {
        return $this->tabelProv->orderBy('provinsi')->get();
    }

    public function getKabupaten($idProv)
    {
        return $this->tabelKab->where('id_prov', $idProv)->orderBy('kabupaten')->get();
    }

    public function getKecamatan($idKab)
    {
        return $this->tabelKec->where('id_kab', $idKab)->orderBy('kecamatan')->get();
    }

    public function getDesa($idKec)
    {
        return $builder = $this->tabelDesa->where('id_kec', $idKec)->orderBy('desa')->get();
    }
}
