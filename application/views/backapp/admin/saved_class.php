<?php
if ($this->session->flashdata('success_delete') != '') {
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
          title: 'Kelas Terhapus',
      })    
      </script>
      ";
}
?>

<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">

        <!-- =============== Kelas Tersimpan ================= -->
        <div class="mt-5 mb-1 p-2 d-flex justify-content-lg-start" data-aos="fade-up" data-aos-duration="700">
            <h5 class="ft-7">Kelas Tersimpan</h5>
        </div>



        <!-- Class List All Component -->
        <div class="d-flex">

            <!-- Class List -->
            <div class="w-100">
                <div class="d-flex card-groups">
                    <?php
                    $no = 1;
                    foreach ($course as $data) { ?>
                        <?php if ($data->has_relation) : ?>
                            <div class="class-lg">
                                <div class="card-area">
                                    <div class="card-class" data-aos="fade-up" data-aos-duration="700">
                                        <div class="d-flex flex-column rounded border">
                                            <div class="class-image">
                                                <img src="<?= base_url('assets/images/admin/course/' . $data->cover) ?>">
                                                <div class="marker"></div>
                                                <form action="<?= site_url('userBranch/classpath/delete_course') ?>" method="post" id="form-id-<?= $no++ ?>" hidden>
                                                    <input type="text" name="id_user" value="<?php echo $id_user ?>">
                                                    <input type="text" name="id_course" value="<?php echo $data->id ?>">
                                                </form>
                                                <div id="<?= $no++ ?>" style="cursor: pointer;" class="like-bottom my-auto mt-auto">
                                                    <i class="position-absolute bx bxs-bookmark like_icon bg-transparent border text-warning bg-danger">
                                                    </i>
                                                </div>

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
                                                        <?php echo anchor('userBranch/classpath/detail_course/' . $data->id, "
                                                        <button class='btn btn-primary bg-first text-xl'>+ Ikuti</button>
                                                    "); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
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
                </div>




            </div>

        </div>
    </div>

</body>