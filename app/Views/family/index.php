<?= $this->extend('layout/template') ?>

<?= $this->section('header') ?>
<!-- header -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="card-header h5 bg-light-success text-success py-3">
    <?= $header; ?>
</div>
<div class="card-body py-2">
    <div class="row">
        <!-- data pasangan -->
        <div class="col-xl-8 col-md-8 col-sm-12">
            <?php
            $url = site_url('family/update/') . $family->id;
            echo form_open($url);
            ?>
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Pasangan</h5>
                </div>
                <input type="hidden" name="id" value="<?= $family->id; ?>">
                <div class="card-body py-4 px-4">
                    <div class="row">

                        <!-- suami -->
                        <div class="col-xl-6 col-sm-12 border border-1 mb-2">
                            <div class="row p-2">
                                <div class="col-xl-5 col-md-6 col-sm-12 p-0">
                                    <img id="avatar_suami" src="<?= base_url('/assets/images/avatars/') . '/' . $family->avatar_suami; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12 py-4">
                                    <h6>Suami</h6>
                                    <input type="hidden" name="id_suami" id="id_suami" value="<?= $family->id_suami !== null ? $family->id_suami : NULL; ?>">
                                    <h5 id="suami">
                                        <?= $family->id_suami !== null ? anchor(site_url('member/') . $family->id_suami, $family->suami) : '-'; ?>
                                    </h5>
                                    <div class="">
                                        <button class="my-2 btn btn-outline-warning" type="button" onclick="editPasangan('Suami')">Edit</button>
                                        <button class="my-2 btn btn-outline-danger" type="button" onclick="hapusPasangan('Suami')" <?= $family->id_suami ? '' : 'disabled' ?>>Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- istri -->
                        <div class="col-xl-6 col-sm-12 border border-1 mb-2">
                            <div class="row p-2">
                                <div class="col-xl-5 col-md-6 col-sm-12 p-0">
                                    <img id="avatar_istri" src="<?= base_url('/assets/images/avatars/') . '/' . $family->avatar_istri; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12 py-4">
                                    <h6>Istri</h6>
                                    <input type="hidden" name="id_istri" id="id_istri" value="<?= $family->id_istri !== null ? $family->id_istri : NULL; ?>">
                                    <h5 id="suami">
                                        <?= $family->id_istri !== null ? anchor(site_url('member/') . $family->id_istri, $family->istri) : '-'; ?>
                                    </h5>
                                    <div class="">
                                        <button class="my-2 btn btn-outline-warning" type="button" onclick="editPasangan('Istri')">Edit</button>
                                        <button class="my-2 btn btn-outline-danger" type="button" onclick="hapusPasangan('Istri')" <?= $family->id_istri ? '' : 'disabled' ?>>Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tanggal nikah status cerai -->
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <label for="" class="form-label">Tanggal Pernikahan</label>
                            <div class="input-group mb-3">
                                <input type="date" name="tgl_nikah" class="form-control datepicker" value="<?= $family->tgl_nikah; ?>">
                            </div>
                        </div>

                        <div class=" col-xl-6 col-sm-12">
                            <label for="" class="form-label">Status Cerai</label>
                            <div class="input-group mb-3">
                                <select class="form-select" name="cerai" value="<?= $family->cerai; ?>">
                                    <option>Pilih</option>
                                    <option <?= $family->cerai == 'Cerai Hidup' ? "selected='selected'" : null; ?> value="Cerai Hidup">Cerai Hidup</option>
                                    <option <?= $family->cerai == 'Cerai Mati' ? "selected='selected'" : null; ?> value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- alamat prov kab -->
                    <label for="" class="form-label">Alamat Tinggal</label>
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_prov" value="<?= $family->id_prov; ?>" id="prov">
                                    <<option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $al) : ?>
                                            <option <?= $al->id == $family->id_prov ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->provinsi; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_kab" value="<?= $family->id_kab; ?>" id="kab">
                                    <option value="">Pilih Kabupaten</option>
                                    <?php foreach ($kabupaten as $al) : ?>
                                        <option <?= $al->id == $family->id_kab ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->kabupaten . " (" . $al->kab_kota . ")"; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <!-- alamat kec desa -->
                    <div class="row">
                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select class="form-select" name="id_kec" value="<?= $family->id_kec; ?>" id="kec">
                                    <<option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $al) : ?>
                                            <option <?= $al->id == $family->id_kec ? "selected='selected'" : null; ?> value="<?= $al->id; ?>"><?= $al->kecamatan; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
                            <div class="input-group mb-3">
                                <select name="desa" id="desa" class="form-select" value="<?= $family->desa; ?>">
                                    <option value="">Pilih Desa/ Kelurahan</option>
                                    <?php foreach ($desa as $al) : ?>
                                        <option <?= $al->desa == $family->desa ? "selected='selected'" : null; ?> value="<?= $al->desa; ?>"><?= $al->desa; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <!-- alamat jl -->
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Jl, Gg, Dusun, ..." name="jl" value="<?= $family->jl; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer p-2 bg-light-info border-0">
                    <button type="button" class="btn btn-danger" onclick="deleteFamily(<?= $family->id; ?>)">Hapus</button>
                    <div class="float-end">
                        <button type="submit" class="btn-success btn">Simpan</button>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>

        <!-- data anak -->
        <div class="col-xl-4 col-md-4 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Anak</h5>
                </div>
                <?= form_open('child/saveall'); ?>
                <div class="card-body py-4 px-4">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <td>Urut</td>
                                    <td>Anak</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <?php if (count($child) > 0) : ?>
                                <tbody>
                                    <?php foreach ($child as $c) : ?>
                                        <tr>
                                            <td>
                                                <input type="hidden" name="id[]" value="<?= $c->id; ?>">
                                                <input type="number" name="urut[]" class="form-control-plaintext" value="<?= $c->urut; ?>" style="max-width: fit-content;">
                                            </td>
                                            <td><?= anchor(site_url('member/') . $c->id_member, $c->nama); ?></td>
                                            <td class="text-end">
                                                <a class="btn btn-sm btn-outline-danger" onclick="deleteChild(<?= $c->id; ?>)"><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                <div class="card-footer p-2 bg-light-info border-0">
                    <button type="button" class="btn-primary btn" onclick="tambahAnak();">Tambah</button>


                    <div class="float-end">
                        <button type="submit" class="btn-success btn">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>

    </div>
</div>



<!-- modal edit-->
<?= view('member/modal-edit') ?>

<!-- end section content -->
<?= $this->endSection() ?>

<!-- section footer -->
<?= $this->section('footer') ?>
<script>
    <?= view('js/ajaxAlamat.js'); ?>
    <?= view('js/ajaxDelete.js'); ?>

    function hapusPasangan(req) {
        let url1 = "<?= site_url('family/deletepasangan/'); ?>" + req;
        let url2 = null;
        let title = `Hapus ${req}?`;
        let body = null;
        let footer = null;
        let id = <?= $family->id ?>;
        ajaxDelete(id, url1, url2, title, body, footer);
    }

    function deleteFamily(id) {
        let url1 = "<?= site_url('family/delete/'); ?>";
        let url2 = "<?= site_url('member/') . session()->lastMemberID; ?>";
        let title = 'Hapus Keluarga?';
        let body = null;
        let footer = 'Data anak yang terhubung dengan id ini juga akan terhapus';
        ajaxDelete(id, url1, url2, title, body, footer);
    }

    function deleteChild(id) {
        let url1 = "<?= site_url('child/delete/'); ?>";
        let url2 = null; //reload
        let title = 'Hapus Anak?';
        let body = null;
        let footer = 'Aksi ini hanya menghapus data anak, bukan data anggota.';
        ajaxDelete(id, url1, url2, title, body, footer);

    }

    function editPasangan(req) {
        idSuami = "<?= $family->id_suami ?>"
        idIstri = "<?= $family->id_istri ?>"

        if (req == 'Suami' && idSuami !== '') {
            Swal.fire({
                title: 'Yakin?',
                text: `Data ${req} sudah ada. Anda ingin menggantinya?`,
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya. Cari!',
                denyButtonText: 'Ya. Baru!',
                cancelButtonText: 'Gagal',
            }).then((result) => {
                if (result.isConfirmed) {
                    showModalCari(req);
                } else if (result.isDenied) {
                    baru('s');
                }
            });
        } else if (req == 'Istri' && idIstri !== '') {
            Swal.fire({
                title: 'Yakin?',
                text: `Data ${req} sudah ada. Anda ingin menggantinya?`,
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya. Cari!',
                denyButtonText: 'Ya. Baru!',
                cancelButtonText: 'Gagal',
            }).then((result) => {
                if (result.isConfirmed) {
                    showModalCari(req);
                } else if (result.isDenied) {
                    baru('i');
                }
            });
        } else {
            Swal.fire({
                title: 'Tetapkan Pasangan',
                text: `Cari dari data yang sudah ada atau buat baru`,
                icon: 'question',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Cari',
                denyButtonText: 'Baru',
                cancelButtonText: 'Gagal',
            }).then((result) => {
                if (result.isConfirmed) {
                    showModalCari(req);
                } else if (result.isDenied) {
                    baru('i');
                }
            });
        }
    }

    function baru(req) {
        let html = '';
        //kosongkan input
        $('#modal-edit :input').val('');
        $('#modal-edit input[name=csrf_test_name]').val('<?= csrf_hash(); ?>');

        // masih ADA masalah pada CHECKBOX
        // $("#modal-edit input[name=wafat_muda]").prop("checked", false);  

        if (req == 's') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select readonly class="form-select" name="lp" aria-label="">
                    <option selected value="L">Laki-Laki</option>
                </select>
                <input type="hidden" name="member_add" value="s">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        } else if (req == 'i') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select readonly class="form-select" name="lp" aria-label="">
                    <option selected value="P">Perempuan</option>
                </select>
                <input type="hidden" name="member_add" value="i">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        } else if (req == 'a') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select required class="form-select" name="lp" aria-label="">
                    <option value="" selected>Pilih</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <input type="hidden" name="member_add" value="a">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        }
        $('#input-lp').html(html);
        $('#modal-edit').modal('show');
    }

    function tambahAnak() {
        Swal.fire({
            title: 'Tambah Anak',
            text: `Cari dari data yang sudah ada atau buat baru`,
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Cari',
            denyButtonText: 'Baru',
            cancelButtonText: 'Gagal',
        }).then((result) => {
            if (result.isConfirmed) {
                showModalCari('Anak');
            } else if (result.isDenied) {
                baru('a');
            }
        });
    }

    function setMember(idMember) {
        const req = $('#request-from').html();
        const idFamily = "<?= $family->id ?>";
        // console.log(idMember);
        // console.log(req);
        let url = null;
        if (req == 'Anak') {
            url = "<?= site_url('child/save') ?>";
        } else if (req == 'Suami') {
            url = "<?= site_url('family/updatepasangan/suami') ?>";
        } else if (req == 'Istri') {
            url = "<?= site_url('family/updatepasangan/istri') ?>";
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': "<?= csrf_hash() ?>"
            },
            type: "post",
            url: url,
            data: {
                id_family: idFamily,
                id_member: idMember,
            },
            dataType: "json",
            success: function(response) {
                // return console.log(response);
                // exit;
                if (response.success == true) {
                    $('#modal-cari').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Oops...',
                        text: response.message,
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>

<!-- end section footer -->
<?= $this->endSection(); ?>