<!-- Header Phone -->

<!--=============== Header Phone ===============-->
<header class="header-phone" id="header-phone">
    <nav class="nav__phone container">
        <div class="nav__menu bg-white" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/user/page') ?>" class="nav__link 
                    <?php if ($this->uri->segment(3) === "page_dash") {
                        echo "active-link";
                    } ?>">
                        <i class="bx bx<?php if ($this->uri->segment(3) === "page_dash") {
                                            echo "s";
                                        } ?>-home-alt-2 nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/classpath/listClass') ?>" class="nav__link 
                    <?php if ($this->uri->segment(2) === "classpath") {
                        echo "active-link";
                    } ?>">
                        <i class="bx bx-library nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?php echo base_url('/userBranch/user/savedClass/' . $id_user) ?>" class="nav__link 
                    <?php if ($this->uri->segment(3) === "savedClass") {
                        echo "active-link";
                    } ?> ">
                        <i class="bx bx<?php if ($this->uri->segment(3) === "savedClass") {
                                            echo "s";
                                        } ?>-heart nav__icon"></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="<?= site_url('/userBranch/user/profile') ?>" class="nav__link 
                    <?php if ($this->uri->segment(3) === "profile") {
                        echo "active-link";
                    } ?> ">
                        <i class='bx bx<?php if ($this->uri->segment(3) === "profile") {
                                            echo "s";
                                        } ?>-user nav__icon'></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>