<div class="modal fade" id="add-anggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <?= form_open('member/save', ['id' => 'save-member']); ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anggota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="" class="form-label">Nama</label>
                    <div class="float-end">
                        <small class="text-end text-info">Tulis nama tanpa gelar kehormatan. </small>
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama lengkap">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">الاسم</label>
                    <input type="text" class="form-control" name="nama_arab" id="nama_arab" placeholder="الاسم بالعربية">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Alias</label>
                    <input type="text" class="form-control" name="alias" id="alias" placeholder="Panggilan, julukan, nama lain, ...">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Wafat</label>
                    <input type="date" class="form-control" name="tgl_wafat" id="tgl_wafat">
                </div>
                <div class="mb-3" id="input-lp">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="lp" aria-label="" id="lp">
                        <option selected="selected" value="">Pilih</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Foto</label>
                    <input disabled class="form-control" type="file" name="avatar" id="avatar">
                    <small>Belum siap</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>