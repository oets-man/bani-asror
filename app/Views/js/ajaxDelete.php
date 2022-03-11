<script type="text/javascript">
    function ajaxDelete(id, url1, url2) {
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda tidak bisa mengembalikan data yang sudah dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Tidak',
            confirmButtonText: 'Ya. Hapus!',
            // timer: 5000
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    url: url1,
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(response) {
                        // ini masih gagal // ajax success tak jalan
                        console.log(response);
                        // alert("ok");
                        if (response.status === true) {
                            // alert('Berhasil');
                            Swal.fire(
                                'Dihapus!',
                                'Data berhasil dihapus.',
                                'success'
                            );
                            location.href = url2;
                        } else {
                            // alert("Gagal dihapus");
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus. <br>Mungkin yang bersangkutan memiliki subdata <br>(hapus terlebih dahulu subdata).',
                                'danger');
                        }
                    },
                    error: function(xhr, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError)
                    }
                });
            }
        })
    }
</script>