<!--=============== Sidebar Tab and Desktop ===============-->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="<?= site_url('front') ?>" class="nav_logo">
                <img src="<?= base_url('assets/img/nazmalogy-small-extra.png') ?>" alt="">
                <span class="nav_logo-name">NaZMaLogy</span>
            </a>
            <div class="nav_list">
                <?php
                $activeSegment = $this->uri->segment(3);
                ?>
                <!-- Dashbaord -->
                <a href="<?= site_url('/userBranch/user/page') ?>" class="nav_link <?= ($activeSegment === "page_dash") ? "active" : "" ?>">
                    <i class="bx bx<?= ($activeSegment === "page_dash") ? "s" : "" ?>-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <!-- Kursus Tersedia -->
                <a href="<?= site_url('/userBranch/classpath/listClass') ?>" class="nav_link <?= ($this->uri->segment(2) === "classpath") ? "active" : "" ?>">
                    <i class="bx bx-library nav_icon"></i>
                    <span class="nav_name">Kelas</span>
                </a>
                <!-- Kursus Tersimpan -->
                <?php
                $activeClass = ($activeSegment === "savedClass") ? "active" : "";
                ?>
                <a href="<?= base_url('/userBranch/user/savedClass/' . $id_user) ?>" class="nav_link <?= $activeClass ?>">
                    <i class="bx bx<?= ($activeSegment === "savedClass") ? "s" : "" ?>-bookmark nav_icon"></i>
                    <span class="nav_name">Tersimpan</span>
                </a>
                <!-- Pengaturan Profil -->
                <?php
                $activeClass = ($activeSegment === "profile") ? "active" : "";
                ?>
                <a href="<?= site_url('/userBranch/user/profile') ?>" class="nav_link <?= $activeClass ?>">
                    <i class="bx bx<?= ($activeSegment === "profile") ? "s" : "" ?>-user nav_icon"></i>
                    <span class="nav_name">Akun Saya</span>
                </a>
            </div>
        </div>
    </nav>
</div>