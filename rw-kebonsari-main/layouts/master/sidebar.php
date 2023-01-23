<?php
    $host = $_SERVER['HTTP_HOST'];
    $hest = "http://".$host."/rw-kebonsari-main/master";
?>
<div class="text-white min-vh-100">
    <a href="#" class="sidebar-brand text-white text-decoration-none">
        <span class="fs-5 d-none d-sm-inline">Menu</span>
    </a>
    <ul class="nav-sidebar" id="menu">
        
        <li>
            <a href="<?php echo $hest; ?>/dashboard/" class="sidebar-link"> <span class="d-none d-sm-inline">Dashboard </a>
        </li>

        <!-- <li>
            <a href="#collapseExample" class="sidebar-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Info KP</a>
            <div class="collapse" id="collapseExample">
                <ul class="nav-sidebar nav-sidebar-sub">
                    <li>
                        <a href="<?php echo $hest; ?>/identitas-kp/" class="sidebar-link"> <span class="d-none d-sm-inline">Identitas KP</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Media Sosial</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Sambutan Ketua RW</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Kabar Desa</span> </a>
                    </li>
                </ul>
            </div>
        </li> -->

        <li>
            <a href="#collapseExample1" class="sidebar-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample1">Kegiatan RW</a>
            <div class="collapse" id="collapseExample1">
                <ul class="nav-sidebar nav-sidebar-sub">
                    <li>
                        <a href="<?php echo $hest; ?>/kegiatan-ronda/" class="sidebar-link"> <span class="d-none d-sm-inline">Kegiatan Ronda</span> </a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <a href="#collapseExample2" class="sidebar-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample2">Kependudukan</a>
            <div class="collapse" id="collapseExample2">
                <ul class="nav-sidebar nav-sidebar-sub">
                    <li>
                        <a href="<?php echo $hest; ?>/warga/" class="sidebar-link"> <span class="d-none d-sm-inline">Data Warga</a>
                    </li>
                    <li>
                        <a href="<?php echo $hest; ?>/kartu-keluarga/" class="sidebar-link"> <span class="d-none d-sm-inline">Data Kartu Keluarga</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- <li>
            <a href="#collapseExample3" class="sidebar-link collapsed" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample3">Admin Web</a>
            <div class="collapse" id="collapseExample3">
                <ul class="nav-sidebar nav-sidebar-sub">
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Artikel</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Galeri</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Menu</span> </a>
                    </li>
                    <li>
                        <a href="#!" class="sidebar-link"> <span class="d-none d-sm-inline">Slider</span> </a>
                    </li>
                </ul>
            </div>
        </li> -->
        <li>
            <a href="<?php echo $hest; ?>/user/" class="sidebar-link"> <span class="d-none d-sm-inline">User </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown dropdown-custom-sidebar pb-4">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="../../assets/image/kotacimahi.png" alt="hugenerd" width="30" height="30" class="rounded-circle">
            <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['role']; ?></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li><a class="dropdown-item" href="../logout.php">Sign out</a></li>             
        </ul>
    </div>
</div>