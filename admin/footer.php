<script src="../assets/js/bootstrap.js"></script>
<script src="../assets/js/bootstrap.bundle.js"></script>
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<?php if (isset ($_GET['pesan'])): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['pesan']; ?>"></div>
<?php endif; ?>
<script>
    $('.hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Apakah Yakin?',
            text: 'Menghapus data ini?',
            icon: 'warning',
            showCancelButton: true,
            canceButtonColor: 'btn btn-info',
            confirmButtonText: 'Hapus Data',
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    })
    $('#konfirmasi-logout').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda Yakin?',
            icon: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout',
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    const flashdata = $('.flash-data').data('flashdata')
    if (flashdata) {
        Swal.fire({
            icon: 'success',
            title: 'success',
            text: 'Berhasil!'
        })
    }


</script>

</body>

</html>