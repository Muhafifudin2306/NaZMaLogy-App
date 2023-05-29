<?php
if ($this->session->flashdata('success_add') != '') {
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
          title: 'Kelas Tersimpan',
      })    
      </script>
      ";
}
?>

<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">

        <!-- =============== Kelas Tersedia ================= -->
        <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
            <h5 class="ft-7">Kelas Tersedia</h5>
        </div>


        <!-- Top Menu -->
        <div class="d-flex btn-filter" data-aos="fade-up" data-aos-duration="700">
            <div class="filter-panel card-lg">
            </div>
            <div class="search-panel card-xxl p-side">
                <div class="d-flex m-js">
                    <button class="mx-2 pc-none btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filter <i class="bx bx-filter"></i>
                    </button>
                </div>
            </div>
        </div>


        <!-- Class List All Component -->
        <div class="d-flex">

            <!-- PC dan Tab Filter -->
            <div class="wd-25" data-aos="fade-up" data-aos-duration="700">
                <div class="area-filter">
                    <div class="card-filter border rounded">
                        <div class="py-3">
                            <div class="search-box">
                                <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                                <form action="<?= base_url('userBranch/classpath/classSearch') ?>" method="get">
                                    <input name="searchTitle" type="text" placeholder="Cari Modul Pembelajaran" id="search" autocomplete="off" value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                                </form>
                                <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                    <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                    <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                                </svg>
                                <div class="go-icon"><i class="bx bx-search"></i></div>
                            </div>
                            <div class="dropdown mt-2">
                                <button class="btn btn-outline-secondary dropdown-toggle category" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bx bx-category-alt"></i> <span class="mx-2"> Urutkan Per</span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClass') ?>">Terbaru - Terlama</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassAsc') ?>">Terlama - Terbaru</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassAZ') ?>">A - Z </a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassZA') ?>">Z - A</a></li>
                                </ul>
                            </div>
                            <h5 class="ft-7 mx-3 mt-4">Kategori</h5>
                            <form action="<?php echo base_url('userBranch/classpath/filter_by_category'); ?>" method="post">
                                <?php foreach ($categories as $category) { ?>
                                    <div class="form-check mt-2 mb-2">
                                        <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                        <label class="form-check-label">
                                            <?= $category->name ?>
                                        </label>
                                    </div>
                                <?php } ?>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary bg-first">Filter</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>



            <!-- Class List -->
            <div class="wd-75">
                <div class="d-flex card-groups">
                    <?php
                    $no = 1;
                    foreach ($course as $data) { ?>

                        <div class="class-lg">
                            <div class="card-area">
                                <div class="card-class" data-aos="fade-up" data-aos-duration="700">
                                    <div class="d-flex flex-column rounded border">
                                        <div class="class-image">
                                            <img src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>">
                                            <div class="marker"></div>
                                            <?php if ($data->has_relation) : ?>
                                                <div class="like-bottom my-auto mt-auto">
                                                    <i class="position-absolute bx bxs-bookmark like_icon bg-transparent border text-white bg-danger">
                                                    </i>
                                                </div>
                                            <?php else : ?>
                                                <form action="<?= site_url('userBranch/classpath/save_course') ?>" method="post" id="form-id-<?= $no++ ?>" hidden>
                                                    <input type="text" name="id_user" value="<?php echo $id_user ?>">
                                                    <input type="text" name="id_course" value="<?php echo $data->id ?>">
                                                </form>
                                                <div id="<?= $no++ ?>" style="cursor: pointer;" class="like-bottom my-auto mt-auto your-id">
                                                    <i class="position-absolute bx bx-bookmark like_icon">
                                                    </i>
                                                </div>

                                            <?php endif; ?>
                                        </div>
                                        <div class="p-2 pb-0 d-flex gap-1 flex-wrap">
                                            <?php
                                            $category = explode(',', $data->category);
                                            foreach ($category as $kat) {
                                                echo "
                                    <button class='btn btn-warning fw-medium' style='font-size:13px'>" . $kat . "</button>";
                                            }
                                            ?>
                                        </div>
                                        <div class="class-title">
                                            <h6 class="ft-7 p-2"><?= $data->title ?></h6>
                                        </div>
                                        <div class="class-action">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex gap-4 popularity">
                                                    <div class="rating">
                                                        <i class="bx bx-star class-icon yellow-image"></i>
                                                        <span class="text-xl"><?= $data->rating ?></span>
                                                    </div>
                                                    <div class="person">
                                                        <i class="bx bx-user class-icon blue-image"></i>
                                                        <span class="text-xl"><?= $data->participant ?></span>
                                                    </div>
                                                </div>
                                                <div class="detail-bottom">

                                                    <?php if ($data->button_label == 'Lanjutkan') : ?>
                                                        <?php echo anchor('userBranch/classpath/detail_course/' . $data->id, "
                                                        <button class='btn btn-primary bg-first text-xl'>Lanjutkan</button>
                                                    "); ?>
                                                    <?php else : ?>
                                                        <?php echo anchor('userBranch/classpath/detail_course/' . $data->id, "
                                                        <button class='btn btn-primary bg-first text-xl'>+ Ikuti</button>
                                                    "); ?>
                                                    <?php endif; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                    <script>
                        var nodesSameClass = document.getElementsByClassName("card-area");

                        for (let i = 1; i <= nodesSameClass.length * 2; i++) {
                            if (i % 2 == 1) {
                                document.getElementById(i + 1).addEventListener("click", function() {
                                    document.getElementById("form-id-" + i).submit();
                                });
                            }


                        }
                    </script>
                    <!-- Pagination -->

                    <!-- <div class="pagination-line" data-aos="fade-up" data-aos-duration="700">
                        <div id="app">
                            <div class="button active"></div>
                            <div class="button"></div>
                            <div class="button"></div>
                            <div class="button"></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- Mobile Filter -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
                <div class="modal-content">
                    <div class="p-5">
                        <div class="search-box">
                            <div class="search-icon"><i class="fa fa-search search-icon"></i></div>
                            <form action="<?= base_url('userBranch/classpath/classSearch') ?>" method="get">
                                <input name="searchTitle" id="search" type="text" placeholder="Cari Modul Pembelajaran" autocomplete="off" value="<?= isset($_GET['searchTitle']) ? $_GET['searchTitle'] : '' ?>">
                            </form>
                            <svg class="search-border" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/" x="0px" y="0px" viewBox="0 0 671 111" style="enable-background:new 0 0 671 111;" xml:space="preserve">
                                <path class="border" d="M335.5,108.5h-280c-29.3,0-53-23.7-53-53v0c0-29.3,23.7-53,53-53h280" />
                                <path class="border" d="M335.5,108.5h280c29.3,0,53-23.7,53-53v0c0-29.3-23.7-53-53-53h-280" />
                            </svg>
                            <div class="go-icon"><i class="bx bx-search"></i></div>
                        </div>
                        <div class="dropdown mt-2">
                            <button class="btn btn-outline-secondary dropdown-toggle category" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bx bx-category-alt"></i> <span class="mx-2"> Urutkan Per</span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClass') ?>">Terbaru - Terlama</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassAsc') ?>">Terlama - Terbaru</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassAZ') ?>">A - Z </a></li>
                                <li><a class="dropdown-item" href="<?= site_url('userBranch/classpath/listClassZA') ?>">Z - A</a></li>
                            </ul>
                        </div>
                        <h5 class="ft-7 mx-3 mt-4">Kategori</h5>
                        <form action="<?php echo base_url('userBranch/classpath/filter_by_category'); ?>" method="post">
                            <?php foreach ($categories as $category) { ?>
                                <div class="form-check mt-2 mb-2">
                                    <input class="form-check-input" value="<?php echo $category->id; ?>" name="category[]" type="checkbox" <?php if (isset($selected_categories) && in_array($category->id, $selected_categories)) echo 'checked' ?>>
                                    <label class="form-check-label">
                                        <?= $category->name ?>
                                    </label>
                                </div>
                            <?php } ?>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary bg-first">Filter</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>