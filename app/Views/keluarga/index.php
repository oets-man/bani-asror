<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card-header h5 bg-light-success text-success py-3">
    <?= $title; ?>
</div>
<?php
helper('form');
echo form_open(site_url('keluarga/update'));
// dd($data);
?>
<div class="card-body py-2">
    <div class="row">
        <div class="col-xl-8 col-md-10 col-sm-12 mx-auto">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Keluarga
                        <!-- <span class="float-end"><i class="bi bi-plus-square-fill"></i></span> -->
                    </h5>
                </div>
                <input type="hidden" name="id" value="<?= $data->id; ?>">
                <div class="card-body py-4 px-4">

                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="mb-2">
                                <img src="<?= base_url('assets/images/faces/male.svg'); ?>" class="img-thumbnail" alt="..." style="max-width: 200px;">
                            </div><label for="" class="form-label">Suami</label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="id_suami" value="<?= $data->id_suami !== null ? $data->id_suami : NULL; ?>">
                                <div class="form-control"><?= $data->id_suami !== null ? anchor(site_url('home/index/') . $data->id_suami, $data->suami) : '-'; ?></div>
                                <button class="btn btn-outline-secondary" type="button" id="btnsuami" onclick="eSuami()">Edit</button>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="mb-2">
                                <img src="<?= base_url('assets/images/faces/female.svg'); ?>" class="img-thumbnail" alt="..." style="max-width: 200px;">
                            </div>
                            <label for="" class="form-label">Istri</label>
                            <div class="input-group mb-3">
                                <input type="hidden" name="id_istri" value="<?= $data->id_istri !== null ? $data->id_istri : NUll; ?>">
                                <div class="form-control"><?= $data->id_istri !== null ? anchor(site_url('home/index/') . $data->id_istri, $data->istri) : '-'; ?></div>
                                <button class="btn btn-outline-secondary" type="button" id="btnistri">Edit</button>
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
    echo form_open('home/add');
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
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
    function eSuami() {
        Swal.fire({
            icon: 'question',
            title: 'Edit data suami?',
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
</script>
<?= $this->endSection(); ?>