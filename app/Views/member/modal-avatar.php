<?= form_open_multipart('member/avatar', [
    'id' => 'avatar-member',
    'class' => ''
]); ?>
<div class="modal fade" id="modal-avatar" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Foto Avatar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <input type="hidden" name="id" value="<?= $member->id ?>">
                <input type="file" class="form-control" name="avatar" id="avatar">
            </div>
            <div class="card-footer">
                <button type="button" disabled class="btn btn-danger" data-bs-dismiss="modal">Hapus</button>

                <div class="float-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>