<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-50">
            <i class="fab fa-telegram-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Persuratan </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- QUERY MENU -->
    <?php
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access_menu` 
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                  ";

    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div>

        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
        <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT *
                     FROM `user_sub_menu` JOIN `user_menu` 
                     ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                     WHERE `user_sub_menu`.`menu_id` = $menuId
                     AND `user_sub_menu`.`is_active` = 1
                     ";

        $SubMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($SubMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['title'] ?></span></a>
                </li>
            <?php endforeach; ?>

            <hr class="sidebar-divider mt-3">

        <?php endforeach; ?>

        <!-- Heading -->
        <div class="sidebar-heading">
            Persuratan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-envelope-square"></i>
                <span>Transaksi surat</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Menu Transaksi:</h6>
                    <a class="collapse-item" href="<?= base_url('user/suratMasuk'); ?>">
                        <i class="fas fa-envelope"></i>
                        <span>Surat Masuk</span>
                    </a>
                    <a class="collapse-item" href="<?= base_url('user/suratKeluar'); ?>">
                        <i class="fas fa-envelope-open-text"></i>
                        <span>Surat Keluar</span>
                    </a>
                    <a class="collapse-item" href="<?= base_url('user/disposisi'); ?>">
                        <i class="fas fa-inbox"></i>
                        <span>Disposisi</span>
                    </a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- <hr class="sidebar-divider">
<div class="sidebar-heading">
    User
</div>

<li class="nav-item">
    <a class="nav-link" href="index.html">
    <i class="fas fa-user-tie"></i>
        <span>User</span></a>
</li> -->

        <!-- Heading -->
        <div class="sidebar-heading">
            Keluar
        </div>

        
        <!-- Nav Item - Pages Collapse Menu -->
        <!-- <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

        <!-- Nav Item - Charts -->
        <!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->

        <!-- Nav Item - Tables -->
        <!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

        <!-- Divider -->
        <!-- <hr class="sidebar-divider d-none d-md-block"> -->

        <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->


        <!-- Nav Item - logout -->
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>
                <span>Keluar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul>
<!-- End of Sidebar -->