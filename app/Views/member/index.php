<?= $this->extend('layout/template') ?>

<?= $this->section('header') ?>
<!-- header -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>
<div class="card-header h5 bg-light-success text-success py-3">
    <?= $title; ?>
</div>
<div class="card-body py-2">

    <div class="row">
        <!-- anggota -->
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Data
                        <span class="float-end">
                            <button class="btn btn-sm btn-outline-warning" onclick="editMember('<?= $data->id; ?>')">
                                <i class="bi bi-pencil-square"></i>
                            </button></span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5 col-sm-12">
                            <img class="img-fluid rounded-start" src="<?= base_url('/assets/images/avatars/') . '/' . $data->avatar; ?>" alt="">
                        </div>
                        <div class="col-xl-7 col-sm-12">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Nama</td>
                                            <td><?= strtoupper($data->nama); ?> (<?= $data->lp; ?>)</td>
                                        </tr>
                                        <tr>
                                            <td>الإسم</td>
                                            <td><?= $data->nama_arab ?: '-'; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Alias</td>
                                            <td><?= $data->alias ?: '-'; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Ayah</td>
                                            <td><?= $data->ayah ? anchor(site_url('member/') . $data->id_ayah, $data->ayah) : '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td><?= $data->ibu ? anchor(site_url('member/') . $data->id_ibu, $data->ibu) : '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td><?= $data->alamat ?: '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td><?= $data->tgl_lahir ?: '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Wafat</td>
                                            <td><?= $data->tgl_wafat ?: '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Usia Wafat</td>
                                            <td><?= $data->usia_wafat ?: '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Wafat Muda</td>
                                            <td><?= $data->wafat_muda == 'Y' ? 'Ya' : '-'; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- pasangan -->
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Keluarga
                        <span class="float-end">
                            <button class="btn btn-sm btn-outline-primary" onclick="newFamily('<?= $data->id ?>', '<?= $data->lp; ?>')">
                                <i class="bi bi-plus-square-fill"></i>
                            </button>
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Pasangan</td>
                                    <td>Anak</td>
                                    <td class="text-end"><i class="bi bi-info-circle-fill"></i></td>
                                </tr>
                            </thead>
                            <?php if (count($keluarga) > 0) : ?>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($keluarga as $k) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $k->id_pasangan ? anchor(site_url('member/') . $k->id_pasangan, $k->pasangan) : '-' ?></td>
                                            <td><?= $k->children_count ?: '-'; ?></td>
                                            <td class="text-end"><?= anchor(site_url('family/') . $k->id_family, '<i class="bi bi-info-circle"></i>'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- anak -->
        <div class="col-xl-4 col-md-6 col-sm-12">
            <div class="card shadow my-4">
                <div class="card-header py-2 bg-light-info">
                    <h5 class="my-0">Anak
                        <!-- <span class="float-end"><i class="bi bi-plus-square-fill"></i></span> -->
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Anak</td>
                                </tr>
                            </thead>
                            <?php if (count($anak) > 0) : ?>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($anak as $a) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><a href="<?= site_url('member/') . $a->id_anak; ?>"><?= $a->anak ?: '-'; ?></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<?= view('member/modal'); ?>


<?= $this->endSection() ?>

<!-- footer -->
<?= $this->section('footer'); ?>
<script>
    function newFamily(id, lp) {
        Swal.fire({
            title: 'Keluarga Baru',
            text: 'Ingin buat keluarga baru?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "post",
                    url: "<?= site_url('family/new'); ?>",
                    data: {
                        id: id,
                        lp: lp
                    },
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (!response.errors) {
                            Swal.fire('Sukses', response.message, 'success')
                            location.href = "<?= site_url('family/'); ?>" + response.id_family
                        }
                    }
                });
            }
        })
    }
</script>

<?= $this->endSection() ?>