<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<style>
    .modal-backdrop {
        display: none !important;
    }
</style>



<body id="body-pd">
    <!--=============== Course Content ===============-->
    <div class="space-top">
        <div class="row pb-5">
            <div class="col-md-12">

                <div class="bg-white p-5 border" data-aos="fade-up" data-aos-duration="700">
                    <!-- =============== Kelas Tersimpan ================= -->
                    <div class="d-flex justify-content-between py-2" data-aos="fade-up" data-aos-duration="700">
                        <h5 class="ft-7">Tambah Data Kursus</h5>
                        <a href="<?= base_url('userBranch/course/class_admin') ?>"><i class="bi bi-x-lg text-black"></i></a>
                    </div>
                    <hr>
                    <form method="post" action="<?= base_url('userBranch/course/save_course') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Judul Kursus
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="title" class="form-control" id="exampleInputname1" placeholder="Judul Kursus Saya" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Cover Kursus
                                <span class="text-danger">*</span>
                            </label>
                            <input type="file" name="cover" class="form-control" id="exampleInputname1" placeholder="Judul Kursus Saya" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Instruktur
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="instructor" class="form-control" id="exampleInputname1" placeholder="Nama Instruktur" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Kategori Kursus
                                <span class="text-danger">*</span>
                            </label>
                            <select style="width: 100%" class="js-example-basic-multiple" name="category[]" multiple aria-required="true">
                                <?php foreach ($categories as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Link Intro Kelas
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" name="intro_link" class="form-control" id="exampleInputname1" placeholder="www.example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Durasi (Menit)
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" placeholder="3" name="intro_duration" class="form-control" id="exampleInputname1" required>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Playlist Kursus
                                <span class="text-danger">*</span>
                            </label>
                            <select style="width: 100%" class="js-example-basic-multiple" name="playlist[]" multiple aria-required="true">
                                <?php foreach ($playlist as $row) { ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Link WA Mentoring
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" placeholder="bit.ly/joinGroupKulWA" name="mentoring_link" class="form-control" id="exampleInputname1" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputname1" class="form-label fw-bold">Ringkasan Kursus
                                <span class="text-danger">*</span>
                            </label>
                            <textarea id="summernote" placeholder="Ringkasan Kursus" name="summary"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary bg-first">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote({
                    height: 250, //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    }
                });
            });
        </script>
</body>