<?= $this->extend('layout/template') ?>

<?= $this->section('header') ?>
<!-- header -->
<?= $this->endSection(); ?>

<?= $this->section('content') ?>

<div class="row">
    <!-- anggota -->
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div class="card shadow m-0 p-0">
            <div class="card-header py-2 card-header">
                <h5 class="my-0">Anggota
                    <span class="float-end">
                        <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modal-avatar">
                            <i class="fa-solid fa-image"></i><small class="ms-2">foto</small>
                        </button>
                        <button class="btn btn-sm btn-outline-warning" onclick="editMember('<?= $member->id; ?>')">
                            <i class="fa-solid fa-pencil"></i><small class="ms-2">edit</small>
                        </button>
                    </span>
                </h5>
            </div>
            <div class="card-body p-2">
                <div class="row">
                    <div class="col-xl-5 col-sm-12">
                        <img class="img-thumbnail" src="<?= base_url('/assets/images/avatars') . '/' .  $member->avatar; ?>">
                    </div>
                    <div class="col-xl-7 col-sm-12">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td><?= strtoupper($member->nama); ?> (<?= $member->lp; ?>)</td>
                                    </tr>
                                    <tr>
                                        <td>الإسم</td>
                                        <td><?= $member->nama_arab ?: '-'; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Alias</td>
                                        <td><?= $member->alias ?: '-'; ?></a></td>
                                    </tr>
                                    <tr>
                                        <td>Ayah</td>
                                        <td><?= $member->ayah ? anchor(site_url('member/') . $member->id_ayah, $member->ayah) : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ibu</td>
                                        <td><?= $member->ibu ? anchor(site_url('member/') . $member->id_ibu, $member->ibu) : '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><?= $member->alamat ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td><?= $member->tgl_lahir ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Wafat</td>
                                        <td><?= $member->tgl_wafat ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Usia Wafat</td>
                                        <td><?= $member->usia_wafat ?: '-'; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Wafat Muda</td>
                                        <td><?= $member->wafat_muda == 'Y' ? 'Ya' : '-'; ?></td>
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
        <div class="card shadow">
            <div class="card-header py-2 bg-light-info">
                <h5 class="my-0">Keluarga
                    <span class="float-end">
                        <button class="btn btn-sm btn-outline-primary" onclick="newFamily('<?= $member->id ?>', '<?= $member->lp; ?>')">
                            <i class="fa-solid fa-square-plus"></i><small class="ms-2">tambah</small>
                        </button>
                    </span>
                </h5>
            </div>
            <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td><?= $member->lp == 'L' ? 'Istri' : 'Suami' ?></td>
                                <td>Anak</td>
                                <td></td>
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
                                        <td class="text-end"><?= anchor(site_url('family/') . $k->id_family, '<i class="fa-solid fa-circle-info"></i> detail', ['class' => 'btn btn-outline-info btn-sm btn']); ?></td>
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
        <div class="card shadow">
            <div class="card-header py-2 bg-light-info">
                <h5 class="my-0">Anak
                    <!-- <span class="float-end"><i class="bi bi-plus-square-fill"></i></span> -->
                </h5>
            </div>
            <div class="card-body p-2">
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

<!-- modal -->
<?= view('member/modal-edit'); ?>
<?= view('member/modal-avatar'); ?>

<?= $this->endSection() ?>

<!-- footer -->
<?= $this->section('footer'); ?>
<script>
    <?= view('js/ajaxDelete.js'); ?>

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
                        'X-CSRF-TOKEN': $('meta[name="X-CSRF-TOKEN"]').attr('content')
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
                        // console.log(response);
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