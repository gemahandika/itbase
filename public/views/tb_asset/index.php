<?php
session_name("itbase_session");
session_start();
include '../../header.php';

include 'modal_asset.php';
$cabang_pilihan = isset($_GET['sistem']) ? urldecode($_GET['sistem']) : '';


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
                    <h5 class="mb-0">DATA ASSET JNE MEDAN</h5>
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
                    <div class="d-flex">
                        <button type="button" class="btn btn-info mb-4 mr-2" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                        <a href="import.php" class="btn btn-warning text-white  mb-4 mr-2">Upload</a>
                        <a href="index.php" type="button" class="btn btn-primary mb-4 mr-2">Data All</a>
                        <a href="fleet_done.php" class="btn btn-success  mb-4">Data Fleet Done</a>
                    </div>
                    <!-- <a href="aktivasi.php" type="button" class="btn btn-info mb-2">Aktivasi</a> -->
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr class="btn-primary">
                                <th class="small text-center">NO</th>
                                <th class="small text-center">PC NAME</th>
                                <th class="small text-center">FLEET</th>
                                <th class="small text-center">DIVISI</th>
                                <th class="small text-center">PIC</th>
                                <th class="small text-center">TYPE</th>
                                <th class="small text-center">BRAND</th>
                                <th class="small text-center">MODEL</th>
                                <th class="small text-center">SERIAL NUMBER</th>
                                <th class="small text-center">SITEM OPERASI</th>
                                <th class="small text-center">LICENSE OS</th>
                                <th class="small text-center">OFFICE</th>
                                <th class="small text-center">LICENSE OFFICE</th>
                                <th class="small text-center">ANTIVIRUS</th>
                                <th class="small text-center">LICENSE ANTIVIRUS</th>
                                <th class="small text-center">OTHER_SOFTWARE</th>
                                <th class="small text-center">LICENSE SOFTWARE</th>
                                <th class="small text-center">MAINTENED BY</th>
                                <th class="small text-center">ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 0;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_asset ORDER BY id_asset DESC") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                                $no++;
                            ?>

                                <tr>
                                    <td class="small text-center"><?= $no; ?></td>
                                    <td class="small text-center <?= strtolower($data['pc_name']) === 'no' ? 'text-danger' : 'text-success' ?>">
                                        <b><?= $data['pc_name'] ?></b>
                                    </td>
                                    <td class="small text-center <?= strtolower($data['fleet']) === 'no' ? 'text-danger' : 'text-success' ?>">
                                        <b><?= $data['fleet'] ?></b>
                                    </td>
                                    <td class="small text-center"><?= $data['divisi_asset'] ?></td>
                                    <td class="small text-center"><?= $data['pic_asset'] ?></td>
                                    <td class="small text-center"><?= $data['type_asset'] ?></td>
                                    <td class="small text-center"><?= $data['brand_asset'] ?></td>
                                    <td class="small text-center"><?= $data['model_asset'] ?></td>
                                    <td class="small text-center"><?= $data['sn_asset'] ?></td>
                                    <td class="small text-center"><?= $data['os_asset'] ?></td>
                                    <td class="small text-center"><?= $data['license_os'] ?></td>
                                    <td class="small text-center"><?= $data['office_asset'] ?></td>
                                    <td class="small text-center"><?= $data['license_office'] ?></td>
                                    <td class="small text-center"><?= $data['antivirus'] ?></td>
                                    <td class="small text-center"><?= $data['license_antivirus'] ?></td>
                                    <td class="small text-center"><?= $data['other_software'] ?></td>
                                    <td class="small text-center"><?= $data['license_other'] ?></td>
                                    <td class="small text-center"><?= $data['maintained'] ?></td>
                                    <td class="small text-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <form action="edit.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['id_asset'] ?>">
                                                <button type="submit" class="btn btn-primary btn-sm text-white mr-2">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>
                                            </form>
                                            <a href="delete.php?id=<?= $data['id_asset'] ?>" class="btn btn-info btn-sm mr-2"> <i class="bi bi-trash"></i>Hapus</a>
                                        </div>
                                    </td>
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
        $('#example').DataTable({
            scrollX: true, // Enable horizontal scroll
            scrollY: '600px', // Enable vertical scroll with height of 300px
            scrollCollapse: true, // Collapse the scroll if not needed
            paging: false // Optional: Disable pagination
        });
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->

</html>