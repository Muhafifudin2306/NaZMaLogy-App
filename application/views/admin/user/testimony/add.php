<body id="body-pd">
    <div class="space-top">
        <div class="row pb-5">
            <div class="col-md-8">
                <div class="bg-white p-5 border" data-aos="zoom-in-up" data-aos-duration="1000">
                    <div class="d-flex justify-content-between py-2">
                        <h5 class="ft-7">Tambah Data Testimoni </h5>
                        <a href="<?= base_url('userBranch/user/setting') ?>"><i class="bi bi-x-lg text-black"></i></a>
                    </div>
                    <hr>
                    <form method="post" action="<?= base_url('userBranch/user/save_testimony') ?>" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="author">Nama Pengguna<span class="text-danger">*</span></label>
                            <input type="text" id="author" name="author" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="image">Foto Pengguna<span class="text-danger">*</span></label>
                            <input type="file" id="image" name="image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="job">Pekerjaan<span class="text-danger">*</span></label>
                            <input type="text" id="job" name="job" class="form-control" placeholder="Pekerjaan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="rating">Rating<span class="text-danger">*</span></label>
                            <select class="form-select" name="rating" aria-label="Default select example" required>
                                <option selected>Pilih Rating</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="status">Status<span class="text-danger">*</span></label>
                            <select class="form-select" name="status" aria-label="Default select example" required>
                                <option selected>Pilih Status</option>
                                <option value="0">Non Aktif</option>
                                <option value="1">Aktif</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold" for="message">Pesan Testimoni<span class="text-danger">*</span></label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary bg-first">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>