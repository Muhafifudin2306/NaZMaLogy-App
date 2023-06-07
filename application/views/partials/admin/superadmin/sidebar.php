<!--=============== Sidebar Tab and Desktop ===============-->
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="<?= site_url('front') ?>" class="nav_logo">
                <img src="<?= base_url('assets/img/nazmalogy-small-extra.png') ?>" alt="">
                <span class="nav_logo-name">NaZMaLogy</span>
            </a>
            <div class="nav_list">
                <a href="<?= site_url('/userBranch/user/page') ?>" class="nav_link <?= ($this->uri->segment(3) === "page_dash") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(3) === "page_dash") ? "s" : "" ?>-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <!-- Pengaturan Akses -->
                <a href="<?= site_url('/userBranch/user/setting') ?>" class="nav_link <?= ($this->uri->segment(3) === "setting") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(3) === "setting") ? "s" : "" ?>-cog nav_icon"></i>
                    <span class="nav_name">Pengaturan Akses</span>
                </a>
                <!-- Pengaturan Kelas -->
                <a href="<?= site_url('/userBranch/course/class_admin') ?>" class="nav_link <?= ($this->uri->segment(3) === "class_admin") ? "active" : "" ?>">
                    <i class="bx bx<?= ($this->uri->segment(3) === "class_admin") ? "s" : "" ?>-book-alt nav_icon"></i>
                    <span class="nav_name">Pengaturan Kelas</span>
                </a>
                <!-- Pengaturan Video -->
                <a href="<?= site_url('/userBranch/playlist/video_admin') ?>" class="nav_link <?= ($this->uri->segment(3) === "video_admin") ? "active" : "" ?>">
                    <i class="bx bxs-playlist nav_icon"></i>
                    <span class="nav_name">Control Video</span>
                </a>
            </div>

        </div>
    </nav>
</div>