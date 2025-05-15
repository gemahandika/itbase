<?php
session_name("itbase_session");
session_start();
include '../../header.php';
// include 'modal_printer.php';
$datetime = date('Y-m-d H:i');
// include 'edit_modal.php';

?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">FORM RESI CANCEL</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <form action="../../../app/Controller/Resi_controller.php" method="POST">
                    <div class="row align-items-end">
                        <!-- No Resi -->
                        <div class="col-md-3 mb-3">
                            <label for="no_resi" class="form-label">No Resi</label>
                            <input type="text" class="form-control" id="no_resi" name="no_resi" required>
                        </div>

                        <!-- Keterangan Cancel -->
                        <div class="col-md-4 mb-3">
                            <label for="keterangan" class="form-label">Keterangan Cancel</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                        </div>

                        <input type="hidden" name="user_id" value="<?= $user1 ?>" readonly>
                        <input type="hidden" name="status" value="OPEN" readonly>
                        <input type="hidden" name="nama_agen" value="<?= $nama ?>" readonly>
                        <!-- Hidden Tanggal Request -->
                        <input type="hidden" name="tgl_req" value="<?= $datetime ?>" readonly>

                        <!-- Tombol Simpan -->
                        <div class="col-md-2 mb-3">
                            <button type="submit" class="btn btn-info w-100" name="add_resi">Proses</button>
                        </div>

                        <!-- Tombol Download -->
                        <div class="col-md-2 mb-3">
                            <a href="report_resi.php" class="btn btn-secondary w-100">Report</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-2">
                        <h6>TABLE REQUEST RESI</h6>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr class="btn-info">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">NOMOR RESI</th>
                                    <th class="small text-center">KETERANGAN</th>
                                    <th class="small text-center">NAMA AGEN</th>
                                    <th class="small text-center">USER ID</th>
                                    <th class="small text-center">TANGGAL REQUEEST CANCEL</th>
                                    <th class="small text-center">TANGGAL PROSES CANCEL</th>
                                    <th class="small text-center">STATUS</th>
                                    <th class="small text-center">ACTION</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $akses = $_SESSION['admin_akses'] ?? [];
                                $no = 0;
                                if (in_array("super_admin", $akses) || in_array("admin", $akses) || in_array("sales", $akses)) {
                                    $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE status = 'OPEN' ORDER BY id_resi DESC");
                                } else {
                                    $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE status = 'OPEN' AND user_id = ? ORDER BY id_resi DESC");
                                    $stmt->bind_param("s", $user1);
                                }

                                $stmt->execute();
                                $result = $stmt->get_result();

                                while ($data = $result->fetch_assoc()) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="small text-center"><?= $no; ?></td>
                                        <td class="small text-center"><?= $data['no_resi'] ?></td>
                                        <td class="small text-center"><?= $data['keterangan'] ?></td>
                                        <td class="small text-center"><?= $data['nama_agen'] ?></td>
                                        <td class="small text-center"><?= $data['user_id'] ?></td>
                                        <td class="small text-center"><?= $data['tgl_req'] ?></td>
                                        <td class="small text-center"><?= $data['tgl_proses'] ?></td>
                                        <td class="small text-center"><?= $data['status'] ?></td>

                                        <td class="small text-center d-flex">
                                            <?php if (has_access($allowed_super_admin)) { ?>
                                                <a href="delete.php?id=<?= $data['id_resi'] ?>" class="btn btn-danger btn-sm mr-2">Tutup</a>
                                            <?php } ?>
                                            <button
                                                type="button"
                                                class="btn btn-primary btn-sm openModalButton"
                                                data-id_resi="<?= $data['id_resi']; ?>"
                                                data-mode="resign"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade bd-example-modal-lg" role="dialog" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                <div class="modal-content" id="modalEditContent">
                                    <!-- isi form akan di-load lewat Ajax -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>

<!-- OverlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>

<!-- Popper.js for Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

<!-- AdminLTE -->
<script src="../../../app/Asset/js/adminlte.js"></script>

<!-- OverlayScrollbars Configuration -->
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

<!-- jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true,
            scrollX: true
        });
        $('#example1').DataTable({
            responsive: true,
            scrollX: true
        });
    });
</script>
<script>
    $(document).on('click', '.openModalButton', function() {
        var id_resi = $(this).data('id_resi');
        var mode = $(this).data('mode');

        $.ajax({
            url: 'edit_modal.php',
            type: 'GET',
            data: {
                id_resi: id_resi,
                mode: mode
            },
            success: function(response) {
                $('#modalEditContent').html(response);
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error: " + xhr.responseText);
            }
        });
    });
</script>

</body>

</html>