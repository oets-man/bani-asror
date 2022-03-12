<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card-header h5 bg-light-success text-success py-3">
    <?= $title; ?>
</div>
<?php
helper('form');
echo form_open(site_url('family/update'));
// dd($data);
?>
<div class="card-body py-2">
    <div class="row">

        <!-- data ortu -->
        <div class="col-xl-8 col-md-8 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Keluarga
                        <!-- <span class="float-end"><i class="bi bi-plus-square-fill"></i></span> -->
                    </h5>
                </div>
                <input type="hidden" name="id" value="<?= $data->id; ?>">
                <div class="card-body py-4 px-4">
                    <div class="row">

                        <!-- suami -->
                        <div class="col-xl-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-xl-5 col-md-6 col-sm-12">
                                    <img src="<?= base_url('assets/images/faces/male-grey.svg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Suami</h6>
                                    <input type="hidden" name="id_suami" value="<?= $data->id_suami !== null ? $data->id_suami : NULL; ?>">
                                    <h5>
                                        <?= $data->id_suami !== null ? anchor(site_url('member/index/') . $data->id_suami, $data->suami) : '-'; ?>
                                    </h5>
                                    <div class="py-2">
                                        <button class="mt-1 btn btn-outline-success" type="button" id="" onclick="baru('s')">Baru</button>
                                        <button class="mt-1 btn btn-outline-info" type="button" id="" onclick="cari('s')">Cari</button>
                                        <button class="mt-1 btn btn-outline-danger" type="button" id="" onclick="hapus('s')">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- istri -->
                        <div class="col-xl-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-xl-5 col-md-6 col-sm-12">
                                    <img src="<?= base_url('assets/images/faces/female-grey.svg'); ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Istri</h6>
                                    <input type="hidden" name="id_istri" value="<?= $data->id_istri !== null ? $data->id_istri : NULL; ?>">
                                    <h5>
                                        <?= $data->id_istri !== null ? anchor(site_url('member/index/') . $data->id_istri, $data->istri) : '-'; ?>
                                    </h5>
                                    <div class="py-2">
                                        <button class="mt-1 btn btn-outline-success" type="button" id="" onclick="baru('i')">Baru</button>
                                        <button class="mt-1 btn btn-outline-info" type="button" id="" onclick="cari('i')">Cari</button>
                                        <button class="mt-1 btn btn-outline-danger" type="button" id="" onclick="hapus('i')">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <label for="" class="form-label">Tanggal Pernikahan</label>
                            <div class="input-group mb-3">
                                <input type="date" name="tgl_nikah" class="form-control" value="<?= $data->tgl_nikah; ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <label for="" class="form-label">Status Cerai</label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="cerai" value="<?= $data->cerai; ?>">
                                    <option>Pilih</option>
                                    <option <?= $data->cerai == 'Cerai Hidup' ? "selected='selected'" : null; ?> value="Cerai Hidup">Cerai Hidup</option>
                                    <option <?= $data->cerai == 'Cerai Mati' ? "selected='selected'" : null; ?> value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- alamat -->
                    <label for="" class="form-label">Alamat Tinggal</label>
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_prov" value="<?= $data->id_prov; ?>" id="prov">
                                    <<option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $al) : ?>
                                            <option <?= $al->id == $data->id_prov ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->provinsi; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_kab" value="<?= $data->id_kab; ?>" id="kab">
                                    <option value="">Pilih Kabupaten</option>
                                    <?php foreach ($kabupaten as $al) : ?>
                                        <option <?= $al->id == $data->id_kab ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->kabupaten . " (" . $al->kab_kota . ")"; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_kec" value="<?= $data->id_kec; ?>" id="kec">
                                    <<option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $al) : ?>
                                            <option <?= $al->id == $data->id_kec ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->kecamatan; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select name="desa" id="desa" class="form-select" value="<?= $data->desa; ?>">
                                    <option value="">Pilih Desa</option>
                                    <?php foreach ($desa as $al) : ?>
                                        <option <?= $al->desa == $data->desa ? "selected='selected'" : null; ?> value="<?= $al->desa; ?>"><?= $al->desa; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Jl, Gg, Dusun, ..." name="jl" value="<?= $data->jl; ?>">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-12">
                            <label for="exampleFormControlTextarea1" class="form-label">Catatan</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="card-footer p-2 bg-light-info border-0">
                    <div class="float-end">
                        <button type="submit" class="btn-success btn">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- data anak -->
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card">
                <div class="card-header">Anak</div>
                <div class="card-body">
                    <ul>
                        <li>a</li>
                        <li>a</li>
                        <li>a</li>
                        <li>a</li>
                        <li>a</li>
                        <li>a</li>
                        <li>a</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<!-- modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-anggota">
    modal
</button>

<div class="modal fade" id="add-anggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <?php
    helper('form');
    echo form_open('member/add');
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <div class="float-end">
                        <small class="text-end text-info">Tulis nama tanpa gelar kehormatan. </small>
                    </div>
                    <input type="text" class="form-control" name="nama" id="" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="nama_arab" id="" placeholder="الاسم بالعربية">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Alias</label>
                    <input type="text" class="form-control" name="alias" id="" placeholder="Panggilan, julukan, nama lain, ...">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Wafat</label>
                    <input type="date" class="form-control" name="tgl_wafat" id="">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="lp" aria-label="">
                        <option selected value="">Pilih</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Foto</label>
                    <input disabled class="form-control" type="file" name="avatar" id="formFile">
                    <small>Belum siap</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>

<?= $this->endSection() ?>

<!-- footer script -->
<?= $this->section('script') ?>

<script src="<?= base_url(); ?>/assets/vendors/sweetalert2/sweetalert2.all.min.js"></script>

<?= view('js/ajaxAlamat'); ?>
<script>
    function edit(p) {
        let pasangan = '';
        if (p == 's') {
            pasangan = 'suami';
        } else if (p == 'i') {
            pasangan = 'istri';
        }
        Swal.fire({
            icon: 'question',
            title: 'Edit data ' + pasangan + '?',
            text: 'Tambah baru atau cari dari data yang sudah ada.',
            showConfirmButton: true,
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Cari',
            denyButtonText: 'Baru',
            cancelButtonText: 'Tutup',
        }).then((result) => {
            if (result.isConfirmed) {
                alert('belum');
            } else if (result.isDenied) {
                $('#add-anggota').modal('show');
            }
        });
    }

    function baru(p) {

    }

    function hapus(p) {
        if (p == 's') {
            alert('tes hapus suami')
        } else if (p == 'i') {
            alert('tes hapus istri')
        }
    }
</script>
<?= $this->endSection(); ?>