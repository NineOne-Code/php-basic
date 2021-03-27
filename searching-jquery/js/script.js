$(document).ready(() => {
    // hilangkan tombol cari
    $('#tombol-cari').hide();

    // event keyword
    $('#keyword').on('keyup', () => {
        // munculkan icon loading
        $('.loader').show();
        //ajax load
        // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), (data) => {
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});