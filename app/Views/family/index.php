<?= $this->extend('layout/template') ?>

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
                    <h5 class="my-0">Data Keluarga</h5>
                </div>
                <input type="hidden" name="id" value="<?= $family->id; ?>">
                <div class="card-body py-4 px-4">
                    <div class="row">

                        <!-- suami -->
                        <div class="col-xl-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-xl-5 col-md-6 col-sm-12">
                                    <img id="avatar_suami" src="<?= base_url('/assets/images/avatars/') . '/' . $family->avatar_suami; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Suami</h6>
                                    <input type="hidden" name="id_suami" id="id_suami" value="<?= $family->id_suami !== null ? $family->id_suami : NULL; ?>">
                                    <h5 id="suami">
                                        <?= $family->id_suami !== null ? anchor(site_url('member/index/') . $family->id_suami, $family->suami) : '-'; ?>
                                    </h5>
                                    <div class="py-2">
                                        <button class="mt-1 btn btn-outline-primary" type="button" id="" onclick="baru('s')">Baru</button>
                                        <button class="mt-1 btn btn-outline-info" type="button" id="" onclick="cari('s')">Cari</button>
                                        <button class="mt-1 btn btn-outline-danger" type="button" id="" onclick="hapusPasangan('s')">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- istri -->
                        <div class="col-xl-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-xl-5 col-md-6 col-sm-12">
                                    <img id="avatar_istri" src="<?= base_url('/assets/images/avatars/') . '/' . $family->avatar_istri; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Istri</h6>
                                    <input type="hidden" name="id_istri" id="id_istri" value="<?= $family->id_istri !== null ? $family->id_istri : NULL; ?>">
                                    <h5 id="istri">
                                        <?= $family->id_istri !== null ? anchor(site_url('member/index/') . $family->id_istri, $family->istri) : '-'; ?>
                                    </h5>
                                    <div class="py-2">
                                        <button class="mt-1 btn btn-outline-primary" type="button" id="" onclick="baru('i')">Baru</button>
                                        <button class="mt-1 btn btn-outline-info" type="button" id="" onclick="cari('i')">Cari</button>
                                        <button class="mt-1 btn btn-outline-danger" type="button" id="" onclick="hapusPasangan('i')">Hapus</button>
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
                                <input type="date" name="tgl_nikah" class="form-control" value="<?= $family->tgl_nikah; ?>">
                            </div>
                        </div>

                        <div class="col-xl-6 col-sm-12">
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

                    <!-- alamat -->
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
                                    <option value="">Pilih Desa</option>
                                    <?php foreach ($desa as $al) : ?>
                                        <option <?= $al->desa == $family->desa ? "selected='selected'" : null; ?> value="<?= $al->desa; ?>"><?= $al->desa; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Jl, Gg, Dusun, ..." name="jl" value="<?= $family->jl; ?>">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer p-2 bg-light-info border-0">
                    <button type="button" class="btn btn-danger" onclick="deleteFamily('<?= $family->id; ?>')">Hapus</button>
                    <div class="float-end">
                        <button type="submit" class="btn-success btn">Simpan</button>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>

        <!-- data anak -->
        <div class="col-xl-4 col-md-4 col-sm-12">
            <?= form_open('child/save'); ?>
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Anak
                        <span class="float-end">
                            <button class="btn btn-sm btn-outline-primary" onclick="">
                                <i class="bi bi-sort-numeric-down"></i>
                            </button>
                        </span>
                    </h5>
                </div>
                <div class="card-body py-4 px-4">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Anak</td>
                                    <td class="text-end">Aksi</td>
                                </tr>
                            </thead>
                            <?php if (count($child) > 0) : ?>
                                <tbody id="input-child">
                                    <?php
                                    $no = 1;
                                    foreach ($child as $c) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= anchor(site_url('member/index/') . $c->id_member, $c->nama . ' (' . $c->lp . ')'); ?></td>
                                            <td class="text-end">
                                                <a class="btn btn-sm btn-outline-danger" onclick="deleteChild('<?= $c->id; ?>')"><i class="bi bi-trash-fill"></i></a>
                                                <a class="btn btn-sm btn-outline-warning" onclick="editMember('<?= $c->id_member; ?>')"><i class="bi bi-pencil-square"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>

                </div>

                <div class="card-footer p-2 bg-light-info border-0">
                    <button type="button" class="btn-primary btn" onclick="baru('a');" id="abaru">Baru</button>
                    <button type="button" class="btn-info btn">Cari</button>
                    <div class="float-end">
                        <!-- <button type="submit" class="btn-success btn">Simpan</button> -->
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>

    </div>
</div>


<!-- modal -->
<?= view('member/modal'); ?>

<?= $this->endSection() ?>

<!-- footer script -->
<?= $this->section('script') ?>


<?= view('js/ajaxAlamat'); ?>
<script>
    function baru(p) {
        var html = '';
        //kosongkan input
        $('#add-anggota :input').val('');
        $('#add-anggota input[name=csrf_test_name]').val('<?= csrf_hash(); ?>');

        // masih ADA masalah pada CHECKBOX
        // $("#add-anggota input[name=wafat_muda]").prop("checked", false);  

        if (p == 's') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select readonly class="form-select" name="lp" aria-label="">
                    <option selected value="L">Laki-Laki</option>
                </select>
                <input type="hidden" name="member_add" value="s">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        } else if (p == 'i') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select readonly class="form-select" name="lp" aria-label="">
                    <option selected value="P">Perempuan</option>
                </select>
                <input type="hidden" name="member_add" value="i">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        } else if (p == 'a') {
            html = `
                <label for="" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="lp" aria-label="">
                    <option selected value="">Pilih</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <input type="hidden" name="member_add" value="a">
                <input type="hidden" name="id_family" value="` + <?= $family->id ?> + `">
                `;
        }
        $('#input-lp').html(html);
        $('#add-anggota').modal('show');
    }

    function cari(p) {
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

    function hapusPasangan(p) {
        if (p == 's') {
            $('#suami').html(null);
            $('#id_suami').attr('value', null);
            $('#avatar_suami').attr('src', null);
        } else if (p == 'i') {
            $('#istri').html(null);
            $('#id_istri').attr('value', null);
            $('#avatar_istri').attr('src', null);
        }
        Swal.fire(
            'Hapus pasangan?',
            'Tekan tombol simpan untuk menyimpan perubahan, atau refresh halaman jika ingin membatalkan.',
            'warning'
        )
    }

    function deleteFamily(id) {
        Swal.fire({
            title: 'Hapus Keluarga',
            text: "Aksi ini tidak dapat dibatalkan.",
            icon: 'warning',
            footer: 'Data anak yang terhubung dengan id ini juga akan terhapus',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Gagal',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('family/delete/'); ?>" + id;
            }
        });
    }

    function deleteChild(id) {
        Swal.fire({
            title: 'Kamu yakin?',
            text: "Aksi ini tidak dapat dibatalkan.",
            icon: 'warning',
            footer: 'Aksi ini hanya menghapus data anak, bukan data anggota.',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Gagal',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "<?= site_url('child/delete'); ?>",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                            //reload masih bermasalah
                        } else {
                            Swal.fire(
                                'Opps..',
                                'Data gagal dihapus.',
                                'warning'
                            );
                        }
                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection(); ?>