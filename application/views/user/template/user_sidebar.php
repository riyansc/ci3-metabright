       <!-- Sidebar -->
       <ul class="navbar-nav bg-dashboard-meta sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('home');?>">
            <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/');?>img/icon-metabright.png" alt="metabright" class="" height="50px" width="50px">
            </div>
            <div class="sidebar-brand-text">Metabright</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Query Menu -->
        <?php 
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT tbl_user_menu.id,menu
                        FROM tbl_user_menu JOIN tbl_user_access_menu
                        ON   tbl_user_menu.id = tbl_user_access_menu.menu_id
                        WHERE tbl_user_access_menu.role_id = $role_id
                        ORDER BY tbl_user_access_menu.menu_id ASC
                    ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>

        <!-- Looping Menu -->
        <?php foreach ($menu as $m) : ?>
            <div class="sidebar-heading">
                <?= $m['menu']; ?>
            </div>

            <!-- Looping Sub Menu -->
            <?php 
            $menuId = $m['id'];
                $querySubMenu = "SELECT *
                FROM tbl_user_sub_menu JOIN tbl_user_menu
                ON   tbl_user_sub_menu.menu_id = tbl_user_menu.id
                WHERE tbl_user_sub_menu.menu_id = $menuId
                AND tbl_user_sub_menu.is_active = 1
                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>

                <?php foreach($subMenu as $sm) : ?>
                    <!-- Nav Item - Dashboard -->

                    <!-- membuat aktiv menu yang terbuka -->
                    <?php if($title == $sm['title']) : ?>
                    <li class="nav-item active">
                        <?php else : ?>
                            <li class="nav-item">
                            <?php endif; ?>

                        <a class="nav-link pb-0" href="<?= base_url($sm['url']);?>">
                            <i class="<?= $sm['icon'];?>"></i>
                            <span><?= $sm['title'];?></span></a>
                    </li>
                <?php endforeach; ?>

                            <!-- Divider -->
                    <hr class="sidebar-divider mt-3">

            <?php endforeach; ?>
        

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout');?>">
                <i class="fas fa-sign-out-alt fa-fw"></i>
                <span>Logout</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

        </ul>
<!-- End of Sidebar -->
