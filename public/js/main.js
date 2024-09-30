$('.btn-delete').click(function() {
    let that = $(this);
    Swal.fire({
        title: 'Konfirmasi Hapus',
        text: "Apakah anda yakin ingin menghapus?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#7a6fbe',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Dihapus!',
                'Berhasil menghapus data.',
                'success'
            );
            that.parent('form').submit();
        }
    })
})

$('#btn-add').click(function(){
    let form = $('#form-add');
    form.toggle('slow');
    if($(this).text() === 'Tambah '){
        $(this).text('Sembunyikan');
    }else{
        $(this).text('Tambah ');
    }  
})