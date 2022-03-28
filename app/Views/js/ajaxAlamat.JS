
//script alamat
$(document).ready(function() {
    //get kabupaten
    $('#prov').change(function(e) {
        $('#kab').html('<option value="">Pilih Kabupaten</option>');
        $('#kec').html('<option value="">Pilih Kecamatan</option>');
        $('#desa').html('<option value="">Pilih Desa/ Kelurahan</option>');

        e.preventDefault();
        let prov = $(this).val();
        if (prov != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?= site_url('alamat/index') ?>",
                method: 'POST',
                data: {
                    id: prov,
                    aksi: 'getKabupaten',
                },
                dataType: "JSON",
                success: function(data) {
                    let html = '<option value="">Pilih Kabupaten</option>';
                    for (let i = 0; i < data.list.length; i++) {
                        html += '<option value="' + data.list[i].id + '">' + data.list[i].kabupaten + ' (' + data.list[i].kab_kota + ')' + '</option>';
                    }
                    $('#kab').html(html);
                    $('meta[name="csrf-token"]').remove();
                    $('head').append('<meta name="csrf-token" content=' + data.csrf_token + '>');
                    $('input[name="csrf_test_name"]').val(data.csrf_token);
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        } else {
            let html = '<option value="">Pilih Kabupaten</option>';
            $('#kab').html(html);
        }
    });

    //get kecamatan
    $('#kab').change(function(e) {
        $('#kec').html('<option value="">Pilih Kecamatan</option>');
        $('#desa').html('<option value="">Pilih Desa/ Kelurahan</option>');

        e.preventDefault();
        let kab = $(this).val();
        if (kab != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?= site_url('alamat/index') ?>",
                method: 'POST',
                data: {
                    id: kab,
                    aksi: 'getKecamatan',
                },
                dataType: "JSON",
                success: function(data) {
                    let html = '<option value="">Pilih Kecamatan</option>';
                    for (let i = 0; i < data.list.length; i++) {
                        html += '<option value="' + data.list[i].id + '">' + data.list[i].kecamatan + '</option>';
                    }
                    $('#kec').html(html);
                    $('meta[name="csrf-token"]').remove();
                    $('head').append('<meta name="csrf-token" content=' + data.csrf_token + '>');
                    $('input[name="csrf_test_name"]').val(data.csrf_token);
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        } else {
            let html = '<option value="">Pilih Kecamatan</option>';
            $('#kec').html(html);
        }
    });

    //get desa
    $('#kec').change(function(e) {
        $('#desa').html('<option value="">Pilih Desa/ Kelurahan</option>');

        e.preventDefault();
        let kec = $(this).val();
        if (kec != '') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?= site_url('alamat/index') ?>",
                method: 'POST',
                data: {
                    id: kec,
                    aksi: 'getDesa',
                },
                dataType: "JSON",
                success: function(data) {
                    let html = '<option value="">Pilih Desa/ Kelurahan</option>';
                    for (let i = 0; i < data.list.length; i++) {
                        html += '<option value="' + data.list[i].desa + '">' + data.list[i].desa + '</option>';
                    }
                    $('#desa').html(html);
                    $('meta[name="csrf-token"]').remove();
                    $('head').append('<meta name="csrf-token" content=' + data.csrf_token + '>');
                    $('input[name="csrf_test_name"]').val(data.csrf_token);
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                }
            });
        } else {
            let html = '<option value="">Pilih Desa/ Kelurahan</option>';
            $('#desa').html(html);
        }
    });
});
