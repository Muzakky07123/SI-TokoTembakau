 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #D19A30;">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-smoking"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Mbako Barokah</div>
</a>

<!-- Divider -->


<!-- Query Menu -->
<?php 
    $role_id = $this->session->userdata('role_id');
    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                    FROM `user_menu` JOIN `user_akses_menu`
                    ON `user_menu`.`id` = `user_akses_menu`.`menu_id`
                    WHERE `user_akses_menu`.`role_id` = $role_id
                    ORDER BY `user_akses_menu`.`menu_id` ASC                         
                    ";
    $menu = $this->db->query($queryMenu)->result_array();

?>


<!-- LOOPINGMENU -->
<?php foreach ($menu as $m) : ?>
<div class="sidebar-heading">
    <?= $m['menu']; ?>
</div>

<!-- SUB MENU SESUAI MENU -->
<?php 
    $menuId = $m['id'];
    $querySubMenu = "SELECT * FROM `user_sub_menu`
                        WHERE `menu_id` = $menuId
                        AND `is_active` = 1";
    $subMenu = $this->db->query($querySubMenu)->result_array();                        
?>
    <?php foreach ($subMenu as $sm) : ?>
    <?php if($title == $sm['title']) : ?>
    <li class="nav-item active">
        <?php else : ?>
            <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
            <i class="<?= $sm['icon']; ?>"></i>
            <span class="text-capitalize"><?= $sm['title']; ?></span></a>
</li>
    <?php endforeach; ?>
    <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

<!-- Heading -->
<div class="sidebar-heading">
    Produk</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages">
        <i class="fas fa-shopping-cart"></i>
        <span>Barang</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?=base_url('Produk/index/tembakau')?>">Tembakau & Cengkeh</a>
            <a class="collapse-item" href="<?=base_url('Produk/index/alatlinting')?>">Alat Linting</a>
            <a class="collapse-item" href="<?=base_url('Produk/index/paper')?>">Paper</a>
            <a class="collapse-item" href="<?=base_url('Produk/index/filter')?>">Filter</a>
            <a class="collapse-item" href="<?=base_url('Produk/index/alatlainnya')?>">Alat lainnya</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="<?=base_url('User/history')?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>History</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout');?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout </span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->