<?php
if (!isset($_SESSION['admin_username'])) {
    header("location:../login/login.php");
}
include '../../../app/Config/koneksi.php';
include '../../../app/Models/Hak_akses.php';
$user1 = $_SESSION['admin_username'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user1'") or die(mysqli_error($koneksi));
$data1 = $sql->fetch_array();
$nama = $data1['nama_user'];
$cabang_user = $data1['cabang'];
$role_user = $data1['status'];
$date = date("Y-m-d");
$time = date("H:i");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JNE Medan | ITBase</title>

    <!-- Meta Description & SEO -->
    <meta name="description" content="Login page JNE Medan ATK System">
    <meta name="keywords" content="JNE, ATK, login system, dashboard, admin panel">
    <meta name="author" content="JNE Medan IT Support">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../app/Asset/img/jne/JNE.png"><!--end::Primary Meta Tags-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../../../app/Asset/css/adminlte.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
        integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <!-- <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item d-none d-md-block"><a href="#" class="nav-link">Contact</a></li> -->
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="../profile/index.php" class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <span style="text-transform: uppercase;"><b class="btn btn-success btn-sm"><?= $user1 ?></b></span>
                            <i class=" bi bi-person-fill"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <div class="brand-link">
                    <span class="brand-text fw-light">IT Base </span>
                    <img
                        src="../../../app/Asset/img/jne/JNE.png"
                        alt="Logo"
                        class="brand-image opacity-75 shadow" />
                </div>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                            <li class="nav-item">
                                <a href="../dashboard/home.php" class="nav-link ">
                                    <i class="nav-icon bi bi-speedometer"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        <?php } ?>


                        <li class="nav-item">
                            <a href="../tb_resi/index.php" class="nav-link ">
                                <i class="nav-icon bi bi-lock"></i>
                                <p>Cancel Resi</p>
                            </a>
                        </li>
                        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                            <li class="nav-item">
                                <a href="../maintenance/index.php" class="nav-link ">
                                    <i class="nav-icon bi bi-tools"></i>
                                    <p>Data Maintenance</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../agen_kp/index.php" class="nav-link ">
                                    <i class="nav-icon bi bi-box-seam-fill"></i>
                                    <p>Data Agen & KP</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../user_hybrid/index.php" class="nav-link ">
                                    <i class="nav-icon bi bi-person-fill"></i>
                                    <p> User Orion Hybrid</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="../sca/index.php" class="nav-link ">
                                    <i class="nav-icon bi bi-people-fill"></i>
                                    <p> User SCA</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../tb_asset/index.php">
                                    <i class="nav-icon bi bi-clipboard-fill"></i>
                                    <p>Data Asset</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../printer_label/index.php">
                                    <i class="nav-icon bi bi-printer-fill"></i>
                                    <p>Printer Label</p>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses']) || in_array("sales", $_SESSION['admin_akses'])) { ?>
                            <li class="nav-item">
                                <a href="../user_app/index.php" class="nav-link">
                                    <i class="nav-icon bi bi-gear"></i>
                                    <p>User Aplikasi</p>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="nav-item mt-4" style="border-top: solid 1px white;">
                            <a href="../login/logout.php" class="nav-link">
                                <i class="nav-icon bi bi-box-arrow-right"></i>
                                <p>Logout</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>