<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />

<?php
if ($this->session->flashdata('success_update') != '') {
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
          title: 'Update Data Sukses',
      })    
      </script>
      ";
} else if ($this->session->flashdata('success_delete_user') != '') {
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
          title: 'Hapus Data Sukses',
      })    
      </script>
      ";
}
?>

<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">
        <?php
        if (isset($error)) {
            echo "<p>Error: " . $error['error'] . "</p>";
        }
        ?>
        <div class="mt-5 mb-1 p-2 d-flex justify-content-between" data-aos="fade-up" data-aos-duration="700">
            <h5 class="ft-7">Testimoni Pengguna</h5>
            <a href="<?= site_url('userBranch/user/add_testimony') ?>"><button class="btn btn-success">+ Tambah </button></a>

        </div>
        <div class="mb-5 pb-3">
            <div class="bg-white p-5 border mb-5" data-aos="fade-up" data-aos-duration="700">
                <table id="example-testimony" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Lengkap</th>
                            <th class="text-center" scope="col">Rating</th>
                            <th class="text-center" scope="col">Status</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($testimonies as $row) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td class="text-center"><?php echo $row->author; ?></td>
                                <td class="text-center"><?php echo round($row->rating); ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <?php if ($row->status == 1) : ?>
                                            <button class="btn btn-success">
                                                Aktif
                                            </button>
                                        <?php else : ?>
                                            <button class="btn btn-danger">
                                                Non-Aktif
                                            </button>
                                        <?php endif ?>
                                    </div>

                                </td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('userBranch/user/edit_testimony/' . $row->id, "<button class='btn btn-primary bg-first'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')" class="btn btn-danger text-white"> <?php echo anchor('userBranch/user/delete_testimony/' . $row->id, "<span class='text-white'>Hapus</span>"); ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
            <h5 class="ft-7">User Subscribe</h5>
        </div>
        <div class="mb-5 pb-3">
            <div class="bg-white p-5 border mb-5" data-aos="fade-up" data-aos-duration="700">
                <table id="example-subscribe" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($subscribes as $row) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-primary bg-first copy-email" data-email="<?= $row->email; ?>"><i class="bi bi-clipboard-fill"></i> Salin</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
            <h5 class="ft-7">Pengaturan Akun</h5>
        </div>

        <div class="mb-5 pb-3">
            <div class="bg-white p-5 border mb-5" data-aos="fade-up" data-aos-duration="700">
                <table id="example-user" class="table display">
                    <thead>
                        <tr">
                            <th class="text-center" scope="col">No</th>
                            <th class="text-center" scope="col">Nama Lengkap</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Role</th>
                            <th class="text-center" scope="col">Aksi</th>
                            </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $row) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $no++ ?></td>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->roles_name; ?></td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <?php echo anchor('userBranch/user/edit_user/' . $row->id, "<button class='btn btn-primary bg-first'>Edit</button>"); ?>
                                        <button onclick="return confirm('Do you want delete this record')" class="btn btn-danger text-white"> <?php echo anchor('userBranch/user/delete_user/' . $row->id, "<span class='text-white'>Hapus</span>"); ?>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
            $('#example-testimony').DataTable();
            $('#example-user').DataTable();
            $('#example-subscribe').DataTable();
        });
    </script>
    <!--=============== Footer Tab and Desktop ===============-->
    <footer class="p-0 mt-5">
        <div class="d-flex justify-content-center">
            <p class="mt-3 ft-7">NaZMa Office &copy 2023
            </p>
        </div>
    </footer>

</body>