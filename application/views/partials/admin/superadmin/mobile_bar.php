<!-- Header Phone -->
<header class="header-phone" id="header-phone">
    <nav class="nav__phone container">
        <div class="nav__menu bg-white" id="nav-menu">
            <ul class="nav__list">
                <?php
                $activeSegment = $this->uri->segment(3);
                $activeClass = ($activeSegment === "page") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/user/page') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bx<?= ($activeSegment === "page") ? "s" : "" ?>-home-alt-2 nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Akses -->
                <?php
                $activeClass = ($activeSegment === "setting") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/user/setting') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bx<?= ($activeSegment === "setting") ? "s" : "" ?>-cog nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Kelas -->
                <?php
                $activeClass = ($activeSegment === "class_admin") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/course/class_admin') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bx<?= ($activeSegment === "class_admin") ? "s" : "" ?>-book-alt nav__icon"></i>
                    </a>
                </li>
                <!-- Pengaturan Video -->
                <?php
                $activeClass = ($activeSegment === "video_admin") ? "active-link" : "";
                ?>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/playlist/video_admin') ?>" class="nav__link <?= $activeClass ?>">
                        <i class="bx bxs-playlist nav__icon"></i>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
</header>