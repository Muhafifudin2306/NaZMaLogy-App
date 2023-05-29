<body id="body-pd">
    <!--=============== Cover ===============-->
    <div class="cover">
        <img class="image-cover" src="<?= base_url('assets/img/background-profile.jpg') ?>" alt="">
        <div class="cover-profile">
        </div>
        <div class="d-flex">
            <div class="card-xl hero-title px-5" data-aos="fade-right" data-aos-duration="300">
                <h2 class="ft-7">Halo <?= $name ?></h2>
                <p>Ini adalah laman profilmu. Anda dapat melihat data diri pribadimu di sini.
                </p>
                <a href="<?= site_url('userBranch/user/page') ?>"> <button class="btn btn-primary bg-first">Dashboard Saya</button> </a>
            </div>
        </div>
    </div>
    <section class="information__section">
        <div class="all__information mb-5 pb-5">
            <div class="row justify-content-center p-2 gap-xl-3 flex-xl-row-reverse flex-md-row-reverse">
                <!-- Summary Information -->
                <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="d-flex flex-column gap-3">
                        <div class="summary__information">
                            <div class="info-card">
                                <!-- Profile Information -->
                                <div id="close__form__profile" class="info-card-content border">
                                    <div class="d-flex justify-content-center p-4">
                                        <?php if (empty($member)) : ?>
                                            <img class="w-100 px-5 rounded-circle" src="<?= base_url('assets/images/profile/12_52923_images.png') ?>" alt="">
                                        <?php else : ?>
                                            <img class="w-100 px-5 rounded-circle" src="<?= base_url('assets/images/profile/' . $member->image) ?>" alt="">
                                        <?php endif ?>
                                    </div>
                                    <div class="name-profile">
                                        <h5 class="ft-7 pt-3 px-4 text-center"><?= $name ?></h5>
                                        <?php if (empty($member)) : ?>
                                            <p class="job text-center">Pekerjaan : - </p>
                                        <?php else : ?>
                                            <p class="job text-center"><?= $member->job ?> </p>
                                        <?php endif ?>

                                    </div>
                                    <div class="sosmed-profile px-4 py-3">
                                        <div class="d-flex gap-3 justify-content-center">
                                            <?php if (empty($member)) : ?>
                                            <?php else : ?>
                                                <a href="<?= $member->instagram ?>"><i class="bx bxl-instagram sosmed-logo"></i></a>
                                                <a href="<?= $member->linkedin ?>"><i class="bx bxl-linkedin sosmed-logo"></i></a>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div class="summary-profile px-3 text-center">
                                        <?php if (empty($member)) : ?>
                                            <p class="text-lg">Deskripsi Pengguna : -</p>
                                        <?php else : ?>
                                            <p class="text-lg"><?= $member->summary ?>-</p>
                                        <?php endif ?>

                                    </div>
                                    <div id="button__show__form__profile" onclick="openFormProfile()" class="edit-profile px-4 pb-3">
                                        <button class="btn btn-outline-warning bg-yellow w-100 text-xl">
                                            <i class="bx bx-edit"></i>
                                            <?php if (empty($member)) : ?>
                                                Tambah Diri
                                            <?php else : ?>
                                                Edit Data Diri
                                            <?php endif ?>
                                        </button>
                                    </div>
                                </div>
                                <!-- Form Edit Profile -->
                                <div id="show__form__profile" class="info-card-content p-4">
                                    <?php if (empty($member)) : ?>
                                        <form action="<?= base_url('userBranch/user/save_profile') ?>" method="post" enctype="multipart/form-data">
                                            <div class="mb-2 p-2 px-4">
                                                <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="image" class="form-label">Foto</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" class="form-control" value="<?= $name ?>" readonly>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="job" placeholder="Pekerjaan Saya">
                                            </div>

                                            <div class="mb-2 p-2 px-4">
                                                <label for="TextInput" class="form-label">Ringkasan Diri Saya</label>
                                                <textarea rows="10" class="form-control" name="summary" placeholder="Ringkasan Diri Anda" id="floatingTextareaDisabled"></textarea>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Akun Instagram</label>
                                                <input type="text" name="instagram" class="form-control" placeholder="@instagramsaya">
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Akun Linked In</label>
                                                <input type="text" name="linkedin" class="form-control" placeholder="Linked-In-Saya">
                                            </div>
                                            <div class="px-4">
                                                <button class="btn btn-outline-warning bg-yellow w-100"> Simpan Informasi
                                                    Pribadi</button>
                                            </div>
                                        </form>
                                    <?php else : ?>
                                        <form action="<?= base_url('userBranch/user/update_profile/' . $id_user) ?>" method="post" enctype="multipart/form-data">
                                            <div class="mb-2 p-2 px-4">
                                                <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="image" class="form-label">Foto : <a target="_blank" href="<?= base_url('assets/images/profile/' . $member->image) ?>">Lihat File Foto</a> </label>
                                                <input type="file" name="image" value="<?= $member->image ?>" class="form-control">
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                                <input type="text" name="name" class="form-control" value="<?= $name ?>" readonly>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Pekerjaan</label>
                                                <input type="text" class="form-control" name="job" value="<?= $member->job ?>">
                                            </div>

                                            <div class="mb-2 p-2 px-4">
                                                <label for="TextInput" class="form-label">Ringkasan Diri Saya</label>
                                                <textarea rows="10" class="form-control" name="summary" id="floatingTextareaDisabled"><?= $member->summary ?></textarea>
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Akun Instagram</label>
                                                <input type="text" name="instagram" class="form-control" value="<?= $member->instagram ?>">
                                            </div>
                                            <div class="mb-2 p-2 px-4">
                                                <label for="disabledTextInput" class="form-label">Akun Linked In</label>
                                                <input type="text" name="linkedin" class="form-control" value="<?= $member->linkedin ?>">
                                            </div>
                                            <div class="px-4">
                                                <button class="btn btn-outline-warning bg-yellow w-100"> Edit Informasi
                                                    Pribadi</button>
                                            </div>
                                        </form>
                                    <?php endif ?>

                                    <div class="px-4">
                                        <button id="button__close__form__profile" onclick="closeFormProfile()" class="btn btn-primary mt-2 bg-first w-100 text-xl">
                                            <i class="bx bx-x"></i>
                                            Batal Edit
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- Personal Information -->
                <div class="col-lg-7 col-md-7" data-aos="fade-up" data-aos-duration="1000">
                    <div class="d-flex flex-column gap-3">
                        <div class="personal__information">
                            <div class="info-card">

                                <div class="info__card__head">
                                    <div class="d-flex justify-content-between py-4 px-4">
                                        <h5 class="ft-7 ">Akun Saya</h5>
                                        <button id="edit__button__info" onclick="openFormInfo()" class="btn btn-outline-warning bg-yellow text-xl">
                                            <i class="bx bx-edit"></i>
                                            Edit Informasi
                                        </button>
                                        <button id="show__button__info" onclick="closeFormInfo()" class="btn btn-primary bg-first">
                                            <i class="bx bx-x text-xl"></i> Batal Edit
                                        </button>
                                    </div>
                                </div>

                                <!-- Show Personal Information Form -->
                                <div id="display__info__content" class="info__card__content">
                                    <h6 class="ft-7 pt-4 px-4">Informasi Personal</h6>
                                    <div class="personal-info-table px-4 pb-2">
                                        <div class="mb-2 p-2">
                                            <label for="disabledTextInput" class="form-label">Email Anda</label>
                                            <input type="text" class="form-control" value="<?= $email ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <hr class="dash-info">
                                    </div>
                                    <h6 class="ft-7 pt-2 px-4">Informasi Alamat</h6>
                                    <div class="personal-info-table px-4 pb-4 p-2">
                                        <div class="mb-2 p-2">
                                            <label for="disabledTextInput" class="form-label">Alamat Saya</label>
                                            <?php if (empty($member)) : ?>
                                                <textarea rows="4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" disabled>Belum Terdata</textarea>
                                            <?php else : ?>
                                                <textarea rows="4" class="form-control" placeholder="Belum Terdata" id="floatingTextarea" disabled><?= $member->address ?></textarea>
                                            <?php endif ?>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kecamatan</label>
                                                <?php if (empty($member)) : ?>
                                                    <input type="text" class="form-control" value="Belum Terdata" disabled>
                                                <?php else : ?>
                                                    <input type="text" class="form-control" value="<?= $member->district ?>" disabled>
                                                <?php endif ?>

                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kabupaten</label>
                                                <?php if (empty($member)) : ?>
                                                    <input type="text" class="form-control" value="Belum Terdata" disabled>
                                                <?php else : ?>
                                                    <input type="text" class="form-control" value="<?= $member->region ?>" disabled>
                                                <?php endif ?>
                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Provinsi</label>
                                                <?php if (empty($member)) : ?>
                                                    <input type="text" class="form-control" value="Belum Terdata" disabled>
                                                <?php else : ?>
                                                    <input type="text" class="form-control" value="<?= $member->province ?>" disabled>
                                                <?php endif ?>
                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kode Pos</label>
                                                <?php if (empty($member)) : ?>
                                                    <input type="text" class="form-control" value="Belum Terdata" disabled>
                                                <?php else : ?>
                                                    <input type="text" class="form-control" value="<?= $member->posCode ?>" disabled>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Personal Information Form -->
                                <div id="edit__info__content" class="info__card__content">
                                    <div class="personal-info-table px-4 py-4">
                                        <?php if (empty($member)) : ?>
                                            <form action="<?= site_url('userBranch/user/save_profile') ?>" method="post" method="post" enctype="multipart/form-data">
                                                <div class="mb-2 p-2 px-4">
                                                    <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                                </div>
                                                <div class="mb-2 p-2">
                                                    <label for="disabledTextInput" class="form-label">Email Anda</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $email ?>" readonly>
                                                </div>
                                                <div class="mb-2 p-2">
                                                    <label for="TextInput" class="form-label">Alamat Saya</label>
                                                    <textarea rows="4" class="form-control" name="address" placeholder="Alamat saya"></textarea>
                                                </div>
                                                <div class="d-flex justify-content-between flex-wrap pb-2">
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kecamatan</label>
                                                        <input type="text" class="form-control" name="district" placeholder="Kecamatan Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kabupaten</label>
                                                        <input type="text" class="form-control" name="region" placeholder="Kabupaten Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Provinsi</label>
                                                        <input type="text" class="form-control" name="province" placeholder="Provinsi Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kode Pos</label>
                                                        <input type="text" class="form-control" name="posCode" placeholder="Kode Pos Saya">
                                                    </div>
                                                </div>
                                                <button class="btn btn-outline-warning bg-yellow w-100"> Simpan Informasi
                                                    Pribadi</button>
                                            </form>
                                        <?php else : ?>
                                            <form action="<?= site_url('userBranch/user/update_address/' . $id_user) ?>" method="post" enctype="multipart/form-data">
                                                <div class="mb-2 p-2 px-4">
                                                    <input type="number" name="id_user" class="form-control" value="<?= $id_user ?>" hidden>
                                                </div>
                                                <div class="mb-2 p-2">
                                                    <label for="disabledTextInput" class="form-label">Email Anda</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $email ?>" readonly>
                                                </div>
                                                <div class="mb-2 p-2">
                                                    <label for="TextInput" class="form-label">Alamat Saya</label>
                                                    <textarea rows="4" class="form-control" name="address" value="<?= $member->address ?>"><?= $member->address ?></textarea>
                                                </div>
                                                <div class="d-flex justify-content-between flex-wrap pb-2">
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kecamatan</label>
                                                        <input type="text" class="form-control" name="district" value="<?= $member->district ?>" placeholder="Kecamatan Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kabupaten</label>
                                                        <input type="text" class="form-control" name="region" value="<?= $member->region ?>" placeholder="Kabupaten Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Provinsi</label>
                                                        <input type="text" class="form-control" name="province" value="<?= $member->province ?>" placeholder="Provinsi Saya">
                                                    </div>
                                                    <div class="mb-2 w-50 p-2">
                                                        <label for="TextInput" class="form-label">Kode Pos</label>
                                                        <input type="text" class="form-control" name="posCode" value="<?= $member->posCode ?>" placeholder="Kode Pos Saya">
                                                    </div>
                                                </div>
                                                <button class="btn btn-outline-warning bg-yellow w-100"> Simpan Informasi
                                                    Pribadi</button>
                                            </form>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </section>



    <!--=============== Footer Tab and Desktop ===============-->
    <footer class="p-0">
        <div class="d-flex justify-content-center">
            <p class="mt-3 ft-7">NaZMa Office &copy 2023
            </p>
        </div>
    </footer>


</body>