<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />



<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">
        <div class="row pb-5">
            <div class="col-md-6">

                <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                    <!-- =============== Kelas Tersimpan ================= -->
                    <div class="d-flex justify-content-between py-2" data-aos="fade-up" data-aos-duration="700">
                        <h5 class="ft-7">Edit Data Pengguna</h5>
                        <a href="<?= base_url('userBranch/user/setting') ?>"><i class="bi bi-x-lg text-black"></i></a>
                    </div>
                    <hr>
                    <form method="post" action="<?php echo base_url('userBranch/user/update_user/' . $user->id); ?>">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label fw-bold">Email
                                <span class="text-danger">*</span>
                            </label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php echo $user->email ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Nama Lengkap
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="name" class="form-control" id="exampleInputname1" value="<?php echo $user->name ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Role
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-select" aria-label="Default select example" aria-required="true" name="id_role">
                                <option value="<?= $user->id_role ?>" selected><?= $user->roles_name ?></option>
                                <option value="1">Super Admin</option>
                                <option value="2">Instruktur</option>
                                <option value="3">Murid</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary bg-first">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>


</body>