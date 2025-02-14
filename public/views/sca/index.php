<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include 'modal_sca.php';
// 
// $cabang_pilihan = isset($_GET['sistem']) ? urldecode($_GET['sistem']) : '';


?>


<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">DATA ID KURIR SCA</h5>
                </div>
            </div>
        </div>
    </div>
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-2">
                        <div class="d-flex">
                            <button type="button" class="btn btn-success mb-4 mr-2" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                            <button type="button" class="btn btn-info mb-4 mr-2">Download</button>
                            <a href="import.php" class="btn btn-primary  mb-4">Upload</a>

                        </div>
                        <!-- <a href="aktivasi.php" type="button" class="btn btn-info mb-2">Aktivasi</a> -->
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">ID KURIR</th>
                                    <th class="small text-center">PASSWORD</th>
                                    <th class="small text-center">FULLNAME</th>
                                    <th class="small text-center">NIK</th>
                                    <th class="small text-center">PHONE</th>
                                    <th class="small text-center">ZONA</th>
                                    <th class="small text-center">CABANG</th>
                                    <th class="small text-center">AGEN / KCU</th>
                                    <th class="small text-center">JOBTASK</th>
                                    <th class="small text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_sca ORDER BY id_sca DESC") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                    $no++;
                                ?>

                                    <tr>
                                        <td class="small text-center"><?= $no; ?></td>
                                        <td class="small text-center"><?= $data['kurir_id'] ?></td>
                                        <td class="small text-center"><?= $data['password_sca'] ?></td>
                                        <td class="small text-center"><?= $data['fullname_sca'] ?></td>
                                        <td class="small text-center"><?= $data['nik_sca'] ?></td>
                                        <td class="small text-center"><?= $data['phone_sca'] ?></td>
                                        <td class="small text-center"><?= $data['zona_sca'] ?></td>
                                        <td class="small text-center"><?= $data['cabang_sca'] ?></td>
                                        <td class="small text-center"><?= $data['status_sca'] ?></td>
                                        <td class="small text-center"><?= $data['jobtask_sca'] ?></td>
                                        <td class="small text-center d-flex">
                                            <?php if (has_access($allowed_super_admin)) { ?>
                                                <a href="delete.php?id=<?= $data['id_counter'] ?>" class="btn btn-danger btn-sm mr-2">Tutup</a>
                                            <?php } ?>
                                            <form action="edit_sca.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['id_sca'] ?>">
                                                <button type="submit" class="btn btn-primary btn-sm text-white mr-2">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>
                                            </form>
                                            <form action="counter_tutup.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['id_sca'] ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="bi bi-lock"></i> Nonaktif
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
    <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <!--end::To the end-->
    <!--begin::Copyright-->
    <strong>
        Copyright &copy; 2014-2024&nbsp;
        <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
    </strong>
    All rights reserved.
    <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="../../../app/Asset/js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable(); // Ganti #example dengan ID tabel Anda
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->

</html>