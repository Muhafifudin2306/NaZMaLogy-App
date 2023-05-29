<?php if ($this->session->flashdata('success_login') != '') { ?>
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
            title: 'Login Sukses',
        })
    </script>
<?php } ?>