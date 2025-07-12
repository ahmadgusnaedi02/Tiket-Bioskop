<!-- Footer -->
<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h5>Cinemystique</h5>
                <p>cinemystique adalah sebuah aplikasi pemesanan tiket bioskop yang dibuat untuk memenuhi salah satu
                    tugas besar Pemrograman Web dasar </p>
                <h5>Developer :</h5>
                <p>Ahmad Gusnaedi | Rayan Ikmal Amala | Elmayda Dyah Irama | Salsabil Amatin Fauzia | Maratus Sholiha
                </p>
                <p>Email : ahmadgusnaedi0208@gmail.com</p>
            </div>
            <div class="col-md-4">
                <h5>Location</h5>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126906.82179001794!2d106.75189733505258!3d-6.28499133370818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698dce2ab0c19d%3A0x5705a69c5fd93556!2sUniversitas%20Bina%20Insani!5e0!3m2!1sid!2ssg!4v1703078843136!5m2!1sid!2ssg"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap JS Bundle with Popper -->
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.bundle.js"></script>
<script src="assets/js/sweetalert2.all.min.js"></script>
<script src="assets/js/jquery-3.7.1.min.js"></script>


<?php if (isset($_GET['pesan'])): ?>
    <div class="flash-data" data-flashdata="<?= $_GET['pesan']; ?>"></div>
<?php endif; ?>
<script>
    $('#konfirmasi').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href')

        Swal.fire({
            title: 'Apakah Yakin?',
            icon: 'warning',
            showCancelButton: true,
            canceButtonColor: '#d33',
            confirmButtonText: 'Logout',
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    })

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