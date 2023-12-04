const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal({
        title: 'Konfirmasi',
        text: 'Berhasil' + flashData,
        type: 'success'
    });
}