$(function() {

    $('.tambah').on('click', function(){
        $('#tambahDataLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data Mahasiswa');
    });

    $('.tampilUbah').on('click', function(){
        $('#tambahDataLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data Mahasiswa');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');
       
        $.ajax({
            url: 'http://localhost/phpmvc/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){ 
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    });

});