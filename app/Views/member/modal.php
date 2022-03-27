<?= form_open('member/save', ['id' => 'save-member']); ?>
<div class="modal fade" id="add-anggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
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

                <div class="mb-3" id="input-lp">
                    <label for="" class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="lp" aria-label="" id="lp">
                        <option selected="selected" value="">Pilih</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat singkat (1 atau 2 kata)">
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Tanggal Wafat</label>
                    <input type="date" class="form-control" name="tgl_wafat" id="tgl_wafat">
                </div>

                <div class="form-check form-check-inline mb-3">
                    <input class="form-check-input" type="checkbox" id="wafat_muda" value="true" name="wafat_muda">
                    <label class="form-check-label" for="wafat_muda">Wafat Muda / Tidak Menikah</label>
                </div>

            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-danger" onclick="deleteMember()">Hapus</button>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?= form_close(); ?>

<script>
    $(document).ready(function() {
        $('#save-member').submit(function(e) {
            e.preventDefault();
            // return console.log($(this).serialize());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function(response) {
                    // return console.log(response);
                    // exit;
                    $('#add-anggota').modal('hide');
                    if (response.success == true) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            location.reload();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });
    });

    function newToken(token) {
        $('meta[name="csrf-token"]').remove();
        $('head').append('<meta name="csrf-token" content=' + token + '>');
        $('input[name="csrf_test_name"]').val(token);
    }

    function deleteMember() {
        var id = $("#add-anggota input[name=id]").val();
        let url1 = "<?= site_url('member/delete/'); ?>";
        let url2 = window.location.pathname.includes('member') ? "<?= site_url('member/'); ?>" : null;
        let title = 'Hapus Anggota?';
        let body = null;
        let footer = 'Data keluarga yang terhubung dengan id ini juga akan terpengaruh';
        ajaxDelete(id, url1, url2, title, body, footer);
    }

    function editMember(id) {
        var url = "<?= site_url('member/find/') ?>" + id;
        // return alert(url);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: url,
            data: {
                id: id
            },
            dataType: "json",
            success: function(response) {
                // console.log(response);
                if (response.errors) {
                    alert(response.errors);
                } else {
                    $("#add-anggota input[name=id]").val(response.data.id);
                    $("#add-anggota input[name=nama]").val(response.data.nama);
                    $("#add-anggota input[name=nama_arab]").val(response.data.nama_arab);
                    $("#add-anggota input[name=alias]").val(response.data.alias);
                    $("#add-anggota input[name=alamat]").val(response.data.alamat);
                    $("#add-anggota input[name=tgl_lahir]").val(response.data.tgl_lahir);
                    $("#add-anggota select[name=lp] option").removeAttr('selected').filter('[value=' + response.data.lp + ']').attr('selected', true);
                    $("#add-anggota input[name=tgl_wafat]").val(response.data.tgl_wafat);

                    if (response.data.wafat_muda == 'Y') {
                        $("#add-anggota input[name=wafat_muda]").prop("checked", true);
                    } else {
                        $("#add-anggota input[name=wafat_muda]").prop("checked", false);
                    }

                    // $("#add-anggota input[name=avatar]").val(response.data.avatar);
                    $('#add-anggota').modal('show');
                }
                // console.log(response);
                newToken(response.csrf_token);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
        });
    }
</script>