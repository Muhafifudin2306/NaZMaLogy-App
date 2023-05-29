<body>
    <?php
    if ($this->session->flashdata('end_session') != '') {
        echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            title: 'Sesi Telah Berakhir',
        })
        </script>
        ";
    } else if ($this->session->flashdata('error_login') != '') {
        echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            title: 'Email atau Password Salah',
        })
        </script>
        ";
    } else if ($this->session->flashdata('success_register') != '') {
        echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'success',
            title: 'Register Sukses',
        })    
        </script>
        ";
    }
    else if ($this->session->flashdata('warning_register') != '') {
        echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'warning',
            title: 'E-mail Sudah Terdaftar',
        })    
        </script>
        ";
    }
    ?>

    <div class="d-flex responsive-form">
        <div class="side-left w-50 m-full">

            <div class="login_field">
                <div class="auth-form">
                    <h2 class="text-center py-4 ft-7">Masuk Akun</h2>
                    <form method="post" action="<?php echo base_url('auth/proses'); ?>">
                        <div class="login__field">
                            <i class="bx bx-envelope login__icon"></i>
                            <input type="text" class="login__input" placeholder="example@example.com" name="email" id="email" required>
                        </div>
                        <div class="login__field">
                            <i class="bx bx-lock login__icon"></i>
                            <input id="passwordInput" type="password" name="password" id="password" class="login__input" placeholder="*********" required>
                        </div>
                        <div class="my-2 mx-1 form-check">
                            <input onclick="showPassword()" type="checkbox" class="form-check-input">
                            <label class="form-check-label">Tampilkan Kata
                                Sandi</label>
                        </div>
                        <div class="p-2">
                            <button type="submit" class="btn
                                    btn-primary bg-first w-100 ft-7"> Masuk
                                Sekarang
                            </button>
                        </div>
                    </form>
                    <div class="px-2">
                        <a href="<?= site_url('/') ?>">
                            <button type="submit" class="btn d-none d-sm-inline btn-danger w-100"> Kembali
                            </button>
                        </a>
                    </div>
                    <!-- <div class="p-2">
                        <button onclick="errorLogin()" class="btn
                                btn-primary bg-first w-100 ft-7">
                            <span> Masuk
                                Sekarang</span>
                        </button>
                    </div> -->
                    <p class=" text-center pt-2">Belum punya akun? <a class="text-first hv-text" href="<?= site_url('auth/register_page') ?>">
                            Daftar sekarang</a> </p>
                </div>

            </div>
        </div>
        <div class="side-right w-50 m-none m-md-full">
            <div class="image-panel">
                <img src="<?= base_url('assets/img/background-auth.jpg') ?>" alt="">
                <div class="panel-cover"></div>
            </div>
            <div class="logo-panel">
                <img src="<?= base_url('assets/img/logo-white-blank.png') ?>" alt="">
            </div>

        </div>
    </div>
</body>