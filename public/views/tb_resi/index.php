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
                        <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses']) || in_array("sales", $_SESSION['admin_akses'])) { ?>
                            <div class="col-md-4 mb-4">
                                <label for="nama_agen" class="form-label">Nama Agen</label>
                                <select type="text" class="form-select select2" id="nama_agen" name="nama_agen">
                                    <option value="">-- Pilih Data --</option>
                                    <?php
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user ORDER BY nama_user ASC") or die(mysqli_error($koneksi));
                                    $result = array();
                                    while ($data = mysqli_fetch_array($sql)) {
                                        $result[] = $data;
                                    }
                                    foreach ($result as $data) {
                                    ?>
                                        <option value="<?= $data['nama_user'] ?>"><?= $data['nama_user'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php } ?>
                        <!-- <input type="hidden" name="nama_agen" value="<?= $nama ?>" readonly> -->
                        <input type="hidden" name="user_id" value="<?= $user1 ?>" readonly>
                        <input type="hidden" name="status" value="OPEN" readonly>
                        <?php if (in_array("AGEN", $_SESSION['admin_akses'])) { ?>
                            <input type="hidden" name="nama_agen" value="<?= $nama ?>" readonly>
                        <?php } ?>
                        <!-- Hidden Tanggal Request -->
                        <input type="hidden" name="tgl_req" value="<?= $datetime ?>" readonly>

                        <!-- Tombol Simpan -->
                        <div class="d-flex col-md-2 mb-3">
                            <button type="submit" class="btn btn-info mr-2" name="add_resi">Proses</button>
                            <a href="report_resi.php" class="btn btn-secondary mr-2">Report</a>
                        </div>
                    </div>
                </form>
                <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                    <div class="col-md-12 d-flex justify-content-end mb-3">
                        <form action="send_open_resi_email.php" method="POST">
                            <button type="submit" class="btn btn-danger">Close Cancel Resi</button>
                        </form>
                    </div>
                <?php } ?>

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
                                    <th class="small text-center">STATUS</th>
                                    <?php if (has_access($allowed_super_admin)) { ?>
                                        <th class="small text-center">ACTION</th>
                                    <?php } ?>
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
                                        <td class="small text-center"><?= $data['status'] ?></td>
                                        <?php if (has_access($allowed_super_admin)) { ?>
                                            <td class="small text-center d-flex">
                                                <a href="delete.php?id=<?= $data['id_resi'] ?>" class="btn btn-danger btn-sm mr-2">Hapus</a>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-sm openModalButton"
                                                    data-id_resi="<?= $data['id_resi']; ?>"
                                                    data-mode="resign"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editModal">
                                                    Edit
                                                </button>
                                                <a href="#"
                                                    class="btn btn-success btn-sm open-stok-modal"
                                                    data-id="<?= $data['id_resi'] ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalStok"
                                                    style="margin-right: 5px;">EDIT NEW</a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="modalStok" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content" id="modalStokContent">
                                    <!-- Konten akan dimuat dengan AJAX -->
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

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
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            width: '100%',
            height: '100px',
            placeholder: '-- Pilih Data --',
            allowClear: true
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');

        if (startDateInput && endDateInput) {
            if (startDateInput.value) {
                endDateInput.min = startDateInput.value;
            }

            startDateInput.addEventListener('change', function() {
                endDateInput.min = this.value;
                if (endDateInput.value < this.value) {
                    endDateInput.value = this.value;
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('open-stok-modal')) {
            e.preventDefault(); // hindari default link behavior jika ada
            var id_barang = e.target.getAttribute('data-id');
            fetch('modal_tambah_stok.php?id=' + id_barang)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('modalStokContent').innerHTML = html;
                    // Trigger bootstrap modal show manually (optional, just in case)
                    var modal = new bootstrap.Modal(document.getElementById('modalStok'));
                    modal.show();
                });
        }
    });
</script>


</body>

</html>