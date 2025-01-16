<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include 'modal_printer.php';
?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">DATA PRINTER LABEL</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-2">
                        <div class="d-flex">
                            <button type="button" class="btn btn-info mb-4 mr-2" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
                            <a href="agen_tutup.php" type="button" class="btn btn-secondary mb-4 mr-2">Download</a>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr class="btn-secondary">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">TYPE PRINTER</th>
                                    <th class="small text-center">CABANG</th>
                                    <th class="small text-center">UNIT</th>
                                    <th class="small text-center">PIC</th>
                                    <th class="small text-center">SERIAL NUMBER</th>
                                    <th class="small text-center">STATUS PRINTER</th>
                                    <th class="small text-center">KERUSAKAN</th>
                                    <th class="small text-center">TGL KIRIM</th>
                                    <th class="small text-center">TGL TERIMA</th>
                                    <th class="small text-center">KETERANGAN</th>
                                    <th class="small text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM printer_label ORDER BY id_printer DESC") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="small text-center"><?= $no; ?></td>
                                        <td class="small text-center"><?= $data['type_printer'] ?></td>
                                        <td class="small text-center"><?= $data['cabang'] ?></td>
                                        <td class="small text-center"><?= $data['unit'] ?></td>
                                        <td class="small text-center"><?= $data['pic'] ?></td>
                                        <td class="small text-center"><?= $data['serial_number'] ?></td>
                                        <td class="small text-center"><?= $data['status_printer'] ?></td>
                                        <td class="small text-center"><?= $data['kerusakan'] ?></td>
                                        <td class="small text-center"><?= $data['tgl_kirim'] ?></td>
                                        <td class="small text-center"><?= $data['tgl_terima'] ?></td>
                                        <td class="small text-center"><?= $data['keterangan'] ?></td>
                                        <td class="small text-center d-flex">
                                            <?php if (has_access($allowed_super_admin)) { ?>
                                                <a href="delete.php?id=<?= $data['id_printer'] ?>" class="btn btn-danger btn-sm mr-2">Tutup</a>
                                            <?php } ?>
                                            <form action="edit.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['id_printer'] ?>">
                                                <button type="submit" class="btn btn-primary btn-sm text-white mr-2">
                                                    <i class="bi bi-pencil"></i> Edit
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
        </div>
    </div>
</main>
</div>

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
            responsive: true, // Membuat tabel responsif
            scrollX: true // Mengaktifkan scroll horizontal jika tabel terlalu lebar
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>