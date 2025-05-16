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
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status != 'NONAKTIF' AND status = 'AGEN' ORDER BY nama_user ASC") or die(mysqli_error($koneksi));
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

                        <input type="hidden" name="user_id" value="<?= $user1 ?>" readonly>
                        <input type="hidden" name="status" value="OPEN" readonly>
                        <?php if (in_array("agen", $_SESSION['admin_akses'])) { ?>
                            <input type="hidden" name="nama_agen" value="<?= $nama ?>" readonly>
                        <?php } ?>
                        <!-- Hidden Tanggal Request -->
                        <input type="hidden" name="tgl_req" value="<?= $datetime ?>" readonly>

                        <!-- Tombol Simpan -->
                        <div class="d-flex col-md-2 mb-3">
                            <button type="submit" class="btn btn-info mr-2" name="add_resi">Proses</button>
                            <a href="report_resi.php" class="btn btn-secondary">Report</a>
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

<?php include '../../footer.php'; ?>