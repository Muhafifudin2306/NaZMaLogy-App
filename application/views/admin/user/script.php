<!--=============== External JS ===============-->
<script type="text/javascript" src="<?= base_url('assets/js/new_admin.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/user_class.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/form.js') ?>"></script>


<!--=============== AOS JS ===============-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
    // multiselect dropdown input
    $(document).ready(function() {
        $(".js-example-basic-multiple").select2();
    });
</script>

<script>
    var splide = new Splide('.splide', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
    });

    splide.mount();
</script>
<script>
    function SupportFunction() {
        window.location.href =
            "<?= site_url('front/support') ?>";
    }

    function LandingPage() {
        window.location.href =
            "<?= site_url('front') ?>";
    }
    // Logut Function
    function logOutFunction() {
        Swal.fire({
            title: "<h3 class='text-dark'> " + "Apakah anda ingin logout?" + "</h3>",
            text: "Aksi ini akan menutup sesi anda!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#2c2f75",
            cancelButtonColor: "#d33",
            confirmButtonText: "Logout!",
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    "<h3 class='text-dark'> " + "Logout Sukses!" + "</h3>",
                    "Anda telah keluar",
                    "success"
                ).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?php echo site_url('auth/logout'); ?>";
                    }
                });
            }
        });
    }
</script>



</html>