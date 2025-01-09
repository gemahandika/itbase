<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include 'modal_counter.php'
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
                    <h5 class="mb-0">DATA AGEN / KP TUTUP</h5>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                    </ol>
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
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="btn-danger">
                                <th class="small text-center">NO</th>
                                <th class="small text-center">CABANG</th>
                                <th class="small text-center">NAMA AGEN / KP</th>
                                <th class="small text-center">CUST ID</th>
                                <th class="small text-center">ORIGIN</th>
                                <th class="small text-center">PIC</th>
                                <th class="small text-center">SYSTEM</th>
                                <th class="small text-center">PRINTER</th>
                                <th class="small text-center">DATEKEY</th>
                                <th class="small text-center">TGL TUTUP</th>
                                <th class="small text-center">STATUS</th>
                                <!-- <th class="small text-center">ACTION</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_counter WHERE status = 'TUTUP' ORDER BY id_counter DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>
                                <tr>
                                    <td class="small text-center"><?= $no; ?></td>
                                    <td class="small text-center"><?= $data['cabang_counter'] ?></td>
                                    <td class="small text-center"><?= $data['nama_counter'] ?></td>
                                    <td class="small text-center"><?= $data['cust_id'] ?></td>
                                    <td class="small text-center"><?= $data['origin'] ?></td>
                                    <td class="small text-center"><?= $data['pic'] ?></td>
                                    <td class="small text-center"><?= $data['sistem'] ?></td>
                                    <td class="small text-center"><?= $data['printer'] ?></td>
                                    <td class="small text-center"><?= $data['datekey'] ?></td>
                                    <td class="small text-center"><?= $data['tutup'] ?></td>
                                    <td class="small text-center"><?= $data['status'] ?></td>
                                    <!-- <td class="small text-center d-flex">
                                        <?php if (has_access($allowed_super_admin)) { ?>
                                            <a href="delete.php?id=<?= $data['id_counter'] ?>" class="btn btn-danger btn-sm mr-2">Tutup</a>
                                        <?php } ?>
                                        <form action="edit.php" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                            <button type="submit" class="btn btn-primary btn-sm text-white mr-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                        </form>
                                        <form action="counter_tutup.php" method="post" style="display:inline;">
                                            <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                            <button type="submit" class="btn btn-info btn-sm">
                                                <i class="bi bi-pencil"></i> Tutup
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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