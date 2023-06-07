<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Laman Pengaturan Website | NaZMaLogy </title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/admin/general/style.php'); ?>
    <script src="<?php echo base_url('assets/node_modules/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/node_modules/datatables.net-dt/css/jquery.dataTables.css'); ?>">
    <script src="<?php echo base_url('assets/node_modules/datatables.net-dt/js/jquery.dataTables.js'); ?>"></script>



</head>

<body id="body-pd">
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/admin/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/admin/superadmin/setting/index.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/admin/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <?php include(APPPATH . 'views/partials/admin/general/script.php'); ?>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var copyButtons = document.querySelectorAll('.copy-email');
            copyButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    var email = this.getAttribute('data-email');
                    copyToClipboard(email);
                    Swal.fire({
                        icon: 'success',
                        title: '<h3 class="text-black fw-bold">' + 'Email Tersalin' + '</h3>',
                        text: 'Email ' + email + ' telah disalin!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
            });

            function copyToClipboard(text) {
                var textarea = document.createElement('textarea');
                textarea.value = text;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example-testimony').DataTable({
                "pageLength": 3,
                "style": "font-size: 0.8rem;"
            });
            $('#example-user').DataTable({
                "pageLength": 3,
                "style": "font-size: 0.8rem;"
            });
            $(document).ready(function() {
                $('#example-subscribe').DataTable({
                    "pageLength": 3,
                    "info": false, // Menyembunyikan info jumlah data
                    "language": {
                        "paginate": {
                            "next": "&#8594;",
                            "previous": "&#8592;"
                        }
                    }
                }).draw();

                // Custom styling for label font size
                $('.dataTables_wrapper label').css('font-size', '0.8rem');
            });
        });
    </script>
    <!-- Script -->
</body>

</html>