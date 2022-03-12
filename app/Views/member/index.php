<?= $this->extend('layout/template') ?>

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
                        <span class="float-end"><i class="bi bi-three-dots"></i></span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-5 col-sm-12">
                            <img class="img-fluid rounded-start" src="<?= $data->lp == 'L' ? base_url('assets/images/faces') . '/male-grey.svg' : base_url('assets/images/faces') . '/female-grey.svg'; ?>" alt="">
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
                                            <td><?= $data->ayah ? anchor(site_url('member/index/') . $data->id_ayah, $data->ayah) : '-'; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ibu</td>
                                            <td><?= $data->ibu ? anchor(site_url('member/index/') . $data->id_ibu, $data->ibu) : '-'; ?></td>
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
                        <?php $p = strtolower($data->lp) == 'l' ? 's' : 'i'; ?>
                        <span class="float-end"><a href="<?= site_url('family/index/') . $data->id  . '/' .  $p; ?>"><i class="bi bi-plus-square-fill"></i></a></span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Pasangan</td>
                                    <td><i class="bi bi-caret-down-square-fill text-info"></i> Anak</td>
                                    <td><i class="bi bi-info-circle-fill"></i></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($keluarga as $k) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><a href="<?= site_url('member/index/') . $k->id_pasangan; ?>"><?= $k->pasangan ?: '-'; ?></a></td>
                                        <td onclick="alert('OK')"><i class="bi bi-caret-down-fill text-info"></i> <?= $k->children_count ?: '-'; ?></td>
                                        <!-- <td class="text-info" onclick='family()'><i class="bi bi-info-circle"></i></td> -->
                                        <td><?= anchor(site_url('family/index/') . $k->id_family, '<i class="bi bi-info-circle"></i>'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
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
                        <span class="float-end"><i class="bi bi-plus-square-fill"></i></span>
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
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($anak as $a) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><a href="<?= site_url('member/index/') . $a->id_anak; ?>"><?= $a->anak ?: '-'; ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>