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
            <div class="card-footer">
                <button type="button" class="btn btn-danger" onclick="deleteMember()">Hapus</button>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</div>

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
        Swal.fire({
            title: 'Hapus Anggota',
            text: "Aksi ini tidak dapat dibatalkan.",
            icon: 'warning',
            footer: 'Data keluarga yang terhubung dengan id ini juga akan terpengaruh',
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
                    url: "<?= site_url('member/delete'); ?>",
                    data: {
                        id: id,
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response == true) {
                            window.location.href = "<?= site_url('member/index') ?>";
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