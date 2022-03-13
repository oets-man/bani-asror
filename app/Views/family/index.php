<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card-header h5 bg-light-success text-success py-3">
    <?= $title; ?>
</div>
<?php
// helper('form');
$url = site_url('family/save');
$url = $isNew ? $url : $url . '/' . $data->id;
echo form_open($url);
// dd($data);
?>
<div class="card-body py-2">
    <div class="row">

        <!-- data ortu -->
        <div class="col-xl-8 col-md-8 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data Keluarga (<?= $isNew ? 'Baru' : 'Edit'; ?>)</h5>
                </div>
                <input type="hidden" name="id" value="<?= $data->id; ?>">
                <div class="card-body py-4 px-4">
                    <div class="row">

                        <!-- suami -->
                        <div class="col-xl-6 col-sm-12 mb-4">
                            <div class="row">
                                <div class="col-xl-5 col-md-6 col-sm-12">
                                    <img id="avatar_suami" src="<?= base_url('/assets/images/avatars/') . '/' . $data->avatar_suami; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Suami</h6>
                                    <input type="hidden" name="id_suami" id="id_suami" value="<?= $data->id_suami !== null ? $data->id_suami : NULL; ?>">
                                    <h5 id="suami">
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
                                    <img id="avatar_istri" src="<?= base_url('/assets/images/avatars/') . '/' . $data->avatar_istri; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-12">
                                    <h6>Istri</h6>
                                    <input type="hidden" name="id_istri" id="id_istri" value="<?= $data->id_istri !== null ? $data->id_istri : NULL; ?>">
                                    <h5 id="istri">
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

                    <!-- tanggal nikah status cerai -->
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
                </div>

                <div class="card-footer p-2 bg-light-info border-0">
                    <?php if (!$isNew) : ?>
                        <button type="button" class="btn btn-danger" onclick="hapusFamily('<?= $data->id; ?>')">Hapus</button>
                    <?php endif; ?>
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
<div class="modal fade" id="add-anggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <?= form_open('member/save', ['id' => 'save-member']);
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
                <div class="mb-3" id="input-lp">
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
    $(document).ready(function() {
        $('#save-member').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    $('#add-anggota').modal('hide');
                    if (response.errors) {
                        alert('error');
                    } else {
                        var site = "<?= site_url('member/index/') ?>";
                        Swal.fire('Sukses', response.message, 'success');
                        var pasangan = "<a href='" + site + response.data.id + "'>" + response.data.nama + "</a>";
                        var avatar = "<?= base_url(); ?>" + "/assets/images/avatars/" + response.data.avatar;
                        if (response.data.lp == 'L') {
                            $('#suami').html(pasangan);
                            $('#id_suami').attr('value', response.data.id);
                            $('#avatar_suami').attr('src', avatar);
                        } else if (response.data.lp == 'P') {
                            $('#istri').html(pasangan);
                            $('#id_istri').attr('value', response.data.id);
                            $('#avatar_istri').attr('src', avatar);
                        }
                    }
                    $('meta[name="csrf-token"]').remove();
                    $('head').append('<meta name="csrf-token" content=' + response.csrf_token + '>');
                    $('input[name="csrf_test_name"]').val(response.csrf_token);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    function baru(p) {
        var html = '';
        if (p == 's') {
            html = `
                <div class="mb-3" id="input-lp">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select readonly class="form-select" name="lp" aria-label="">
                        <option selected value="L">Laki-Laki</option>
                    </select>
                </div>`;
        } else if (p == 'i') {
            html = `
                <div class="mb-3" id="input-lp">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select readonly class="form-select" name="lp" aria-label="">
                        <option selected value="P">Perempuan</option>
                    </select>
                </div>`;
        }
        $('#add-anggota').modal('show');
        $('#input-lp').html(html);

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

    function hapus(p) {
        if (p == 's') {
            alert('tes hapus suami')
        } else if (p == 'i') {
            alert('tes hapus istri')
        }
    }

    function hapusFamily(id) {
        Swal.fire({
            icon: 'warning',
            title: 'Yakin menghapus keluarga ini?',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= site_url('family/del/'); ?>" + id;
            }
        })
    }
</script>
<?= $this->endSection(); ?>