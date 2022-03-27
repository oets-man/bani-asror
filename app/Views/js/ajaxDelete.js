function ajaxDelete(id, url1, url2=null,textTitle=null, textBody=null,textFooter=null) {
    Swal.fire({
        title: textTitle?textTitle:"Hapus!",
        text: textBody?textBody:"Aksi ini tidak dapat dibatalkan.",
        icon: 'warning',
        footer: textFooter,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Gagal',
        confirmButtonText: 'Ya. Hapus!',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: url1,
                data: {id: id},
                dataType: "json",
                success: function(response) {
                    if (response.success === true) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result) => {
                            if(url2){
                                location.href = url2;
                            }else{
                                location.reload();
                            }
                        });
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
    });
}
