<body id="body-pd">
    <!--=============== Cover ===============-->
    <div class="cover">
        <img class="image-cover" src="<?= base_url('assets/img/background-profile.jpg') ?>" alt="">
        <div class="cover-profile">
        </div>
        <div class="d-flex">
            <div class="card-xl hero-title px-5" data-aos="fade-right" data-aos-duration="300">
                <h2 class="ft-7">Halo Afifudin</h2>
                <p>Ini adalah laman profilmu. Anda dapat melihat data diri pribadi
                    anda, pencapaian sertifikat, dan perkembangan belajarmu.
                </p>
                <a href="dashboard.html"> <button class="btn btn-primary bg-first">Dashboard Saya</button> </a>
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
                                <div id="close__form__profile" class="info-card-content">
                                    <div class="image-profile pt-4">
                                        <img src="<?= base_url('assets/img/Foto_Muhammad_Afifudin.png') ?>" alt="">
                                    </div>
                                    <div class="name-profile">
                                        <h5 class="ft-7 pt-3 px-4 text-center">Muhammad Afifudin, 21</h5>
                                        <p class="job text-center">Web Developer</p>
                                    </div>
                                    <div class="sosmed-profile px-4 py-3">
                                        <div class="d-flex gap-3 justify-content-center">
                                            <a href=""><i class="bx bxl-gmail sosmed-logo"></i></a>
                                            <a href=""><i class="bx bxl-instagram sosmed-logo"></i></a>
                                            <a href=""><i class="bx bxl-linkedin sosmed-logo"></i></a>
                                        </div>

                                    </div>
                                    <div class="summary-profile px-3 text-center">
                                        <p class="text-lg">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                            Rerum iure qui
                                            facilis
                                            molestias provident quo ullam eius quia nulla veniam!</p>
                                    </div>
                                    <div class="interest-profile px-4 pt-2 pb-4">
                                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                                            <button class="text-lg btn btn-outline-secondary text-xl">#Web</button>
                                            <button class="text-lg btn btn-outline-primary text-xl">#Technology</button>
                                        </div>
                                    </div>
                                    <div id="button__show__form__profile" onclick="openFormProfile()" class="edit-profile px-4 pb-3">
                                        <button class="btn btn-outline-warning bg-yellow w-100 text-xl">
                                            <i class="bx bx-edit"></i>
                                            Edit Data Diri
                                        </button>
                                    </div>
                                </div>
                                <!-- Form Edit Profile -->
                                <div id="show__form__profile" class="info-card-content p-4">
                                    <form action="">
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Foto</label>
                                            <input type="file" class="form-control">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" placeholder="Muhammad Afifudin">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="TextInput" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Pekerjaan</label>
                                            <input type="text" class="form-control" placeholder="Web Developer">
                                        </div>

                                        <div class="mb-2 p-2 px-4">
                                            <label for="TextInput" class="form-label">Ringkasan</label>
                                            <textarea rows="10" class="form-control" placeholder="Leave a comment here" id="floatingTextareaDisabled">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestias dolorem sapiente placeat beatae voluptates, accusantium aspernatur tenetur iusto explicabo cupiditate cumque facere minima error deleniti, fugit sit necessitatibus, blanditiis quidem.</textarea>
                                        </div>

                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Alamat Gmail</label>
                                            <input type="text" class="form-control" placeholder="Web Developer">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun Instagram</label>
                                            <input type="text" class="form-control" placeholder="Web Developer">
                                        </div>
                                        <div class="mb-2 p-2 px-4">
                                            <label for="disabledTextInput" class="form-label">Akun Linked In</label>
                                            <input type="text" class="form-control" placeholder="Web Developer">
                                        </div>
                                        <div class="mb-2 p-2 px-4">

                                            <label for="disabledTextInput" class="form-label">Peminatan</label>
                                            <select style="width: 100%" class="js-example-basic-multiple" name="states[]" multiple="multiple">
                                                <option selected value="Web">#Web</option>
                                                <option selected value="Technology">#Technology</option>
                                                <option selected value="Business">#Business</option>
                                            </select>
                                        </div>
                                        <div class="px-4">
                                            <button class="btn btn-outline-warning bg-yellow w-100"> Simpan Informasi
                                                Pribadi</button>
                                        </div>


                                    </form>
                                    <div class="px-4">
                                        <button id="button__close__form__profile" onclick="closeFormProfile()" class="btn btn-primary mt-2 bg-first w-100 text-xl">
                                            <i class="bx bx-x"></i>
                                            Batal Edit
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="summary__information">
                            <div class="info-card">
                                <div class="info__card__content">
                                    <div class="info__card__head">
                                        <h5 class="p-4 ft-7 ">Riwayat Poin</h5>
                                    </div>
                                    <div class="li-award px-4 py-3">
                                        <div class="d-flex p-1">
                                            <div class="title-poin d-flex align-items-center">
                                                <span class="text-lg">Login Akun</span>
                                            </div>
                                            <div class="number-poin d-flex justify-content-center align-items-center">
                                                <span class="text-warning">+200</span>
                                            </div>
                                            <h6></h6>
                                        </div>
                                        <div class="d-flex p-1">
                                            <div class="title-poin d-flex align-items-center">
                                                <span class="text-lg">Menonton Video</span>
                                            </div>
                                            <div class="number-poin d-flex justify-content-center align-items-center">
                                                <span class="text-warning">+50</span>
                                            </div>
                                            <h6></h6>
                                        </div>
                                        <div class="d-flex p-1">
                                            <div class="title-poin d-flex align-items-center">
                                                <span class="text-lg">Mengerjakan Soal</span>
                                            </div>
                                            <div class="number-poin d-flex justify-content-center align-items-center">
                                                <span class="text-warning">+40</span>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <a href="#">
                                                <button class="w-100 text-lg btn btn-outline-warning bg-yellow">Lebih
                                                    Detail</button>
                                            </a>
                                        </div>


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
                                    <h5 class="p-4 ft-7 ">Sertifikat dan Pencapaian</h5>
                                </div>

                                <!-- Show Personal Information Form -->
                                <div class="info__card__content">
                                    <div class="li-award px-2 py-3">
                                        <div class="d-flex pb-4">
                                            <div class="icon-award d-flex justify-content-center align-items-center">
                                                <i class="bx bx-bar-chart-alt-2 nav_icon"></i>
                                            </div>
                                            <div class="title-award d-flex align-items-center">
                                                <span class="text-lg">Membangun Ketangguhan Bisnis dengan
                                                    Diversifikasi Inovasi Produk</span>
                                            </div>
                                            <div class="date-award d-flex justify-content-center align-items-center">
                                                <span class="text-lg">12 Apr 2023</span>
                                            </div>
                                            <div class="action-award d-flex justify-content-center align-items-center">
                                                <a href="#" class="text-lg">

                                                    <span class="gap-2"><i class="bx bx-download"></i> Unduh</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="d-flex pb-4">
                                            <div class="icon-award d-flex justify-content-center align-items-center">
                                                <i class="bx bx-award nav_icon"></i>
                                            </div>
                                            <div class="title-award d-flex align-items-center">
                                                <span class="text-lg">Sprint Learning Level 1</span>
                                            </div>
                                            <div class="date-award d-flex justify-content-center align-items-center">
                                                <span class="text-lg">12 Apr 2023</span>
                                            </div>
                                            <div class="action-award d-flex justify-content-center align-items-center">
                                                <span class="text-lg">5000 Poin</span>
                                            </div>
                                        </div>
                                        <div class="pt-2">
                                            <a href="#">
                                                <button class="w-100 text-lg btn btn-outline-warning bg-yellow">Lebih
                                                    Detail</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
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
                                            <input type="text" class="form-control" placeholder="muhafifudin2306@gmail.com" disabled>
                                        </div>
                                        <div class="mb-2 p-2">
                                            <label for="disabledTextInput" class="form-label">Nomor Telepon</label>
                                            <input type="text" class="form-control" placeholder="083866678086" disabled>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <hr class="dash-info">
                                    </div>
                                    <h6 class="ft-7 pt-2 px-4">Informasi Alamat</h6>
                                    <div class="personal-info-table px-4 pb-4 p-2">
                                        <div class="mb-2 p-2">
                                            <label for="disabledTextInput" class="form-label">Alamat Saya</label>
                                            <textarea rows="4" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" disabled>Jl. Selokan Mataram Jl. Pogung Dalangan No.16, RT.11/RW.50, Pogung Kidul, Sinduadi</textarea>
                                        </div>
                                        <div class="d-flex justify-content-between flex-wrap">
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kecamatan</label>
                                                <input type="text" class="form-control" placeholder="Mlati" disabled>
                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kabupaten</label>
                                                <input type="text" class="form-control" placeholder="Sleman" disabled>
                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Provinsi</label>
                                                <input type="text" class="form-control" placeholder="Daerah istimewa Yogyakarta" disabled>
                                            </div>
                                            <div class="mb-2 w-50 p-2">
                                                <label for="disabledTextInput" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" placeholder="55284" disabled>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Edit Personal Information Form -->
                                <div id="edit__info__content" class="info__card__content">
                                    <div class="personal-info-table px-4 py-4">
                                        <form action="">
                                            <div class="mb-2 p-2">
                                                <label for="disabledTextInput" class="form-label">Email Anda</label>
                                                <input type="text" class="form-control" placeholder="muhafifudin2306@gmail.com">
                                            </div>
                                            <div class="mb-2 p-2">
                                                <label for="TextInput" class="form-label">Nomor Telepon</label>
                                                <input type="text" class="form-control" placeholder="083866678086">
                                            </div>
                                            <div class="mb-2 p-2">
                                                <label for="TextInput" class="form-label">Alamat Saya</label>
                                                <textarea rows="4" class="form-control" placeholder="Leave a comment here">Jl. Selokan Mataram Jl. Pogung Dalangan No.16, RT.11/RW.50, Pogung Kidul, Sinduadi</textarea>
                                            </div>
                                            <div class="d-flex justify-content-between flex-wrap pb-2">
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kecamatan</label>
                                                    <input type="text" class="form-control" placeholder="Mlati">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kabupaten</label>
                                                    <input type="text" class="form-control" placeholder="Sleman">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Provinsi</label>
                                                    <input type="text" class="form-control" placeholder="Daerah istimewa Yogyakarta">
                                                </div>
                                                <div class="mb-2 w-50 p-2">
                                                    <label for="TextInput" class="form-label">Kode Pos</label>
                                                    <input type="text" class="form-control" placeholder="55284">
                                                </div>
                                            </div>
                                            <button class="btn btn-outline-warning bg-yellow w-100"> Simpan Informasi
                                                Pribadi</button>
                                        </form>

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