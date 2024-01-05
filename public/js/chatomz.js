function deleteRow(id,key='data')
{
    Swal.fire({
        title: 'Apakah yakin akan mengapus data ini?',
        text: "Data yang terhapus tidak dapat dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal',
        customClass: {
            confirmButton: 'btn btn-primary me-3',
            cancelButton: 'btn btn-label-secondary'
        },
        buttonsStyling: false
        }).then(function (result) {
        if (result.value) {
            Swal.fire({
            icon: 'success',
            title: 'Terhapus!',
            text: 'Data telah dihapus.',
            showConfirmButton: false,
            });
            $('#'+key+'-'+id).submit();
        }
        });
}