<?php
session_name("itbase_session");
session_start();
include '../../header.php';
// include 'modal_printer.php';
$datetime = date('Y-m-d H:i');
$start_date = $_GET['start_date'] ?? '';
$end_date = $_GET['end_date'] ?? '';

?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">DATA REPORT RESI CANCEL</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <form action="" method="GET">
                    <div class="row align-items-end">
                        <!-- Dari Tanggal -->
                        <div class="col-md-3 mb-3">
                            <label for="start_date" class="form-label">Dari Tanggal</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required value="<?= htmlspecialchars($start_date) ?>">
                        </div>

                        <!-- Sampai Tanggal -->
                        <div class="col-md-4 mb-3">
                            <label for="end_date" class="form-label">Sampai Tanggal</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required value="<?= htmlspecialchars($end_date) ?>">
                        </div>

                        <!-- Tombol -->
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <a href="report_resi.php" class="btn btn-secondary">Reset</a>
                            <a href="export_resi.php?filter_start=<?= htmlspecialchars($start_date) ?>&filter_end=<?= htmlspecialchars($end_date) ?>" class="btn btn-success">Download Data</a>

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
                                <tr class="btn-primary">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">NOMOR RESI</th>
                                    <th class="small text-center">KETERANGAN</th>
                                    <th class="small text-center">NAMA AGEN</th>
                                    <th class="small text-center">USER ID</th>
                                    <th class="small text-center">TANGGAL REQUEEST CANCEL</th>
                                    <th class="small text-center">TANGGAL PROSES CANCEL</th>
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
                                $start_date = $_GET['start_date'] ?? null;
                                $end_date = $_GET['end_date'] ?? null;

                                if ($start_date && $end_date) {
                                    $start_datetime = $start_date . ' 00:00:00';
                                    $end_datetime = $end_date . ' 23:59:59';
                                    if (in_array("super_admin", $akses) || in_array("admin", $akses) || in_array("sales", $akses)) {
                                        $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE tgl_req BETWEEN ? AND ? ORDER BY id_resi DESC");
                                        $stmt->bind_param("ss", $start_datetime, $end_datetime);
                                    } else {
                                        $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE user_id = ? AND tgl_req BETWEEN ? AND ? ORDER BY id_resi DESC");
                                        $stmt->bind_param("sss", $user1, $start_datetime, $end_datetime);
                                    }
                                } else {
                                    if (in_array("super_admin", $akses) || in_array("admin", $akses) || in_array("sales", $akses)) {
                                        $stmt = $koneksi->prepare("SELECT * FROM tb_resi  ORDER BY id_resi DESC");
                                    } else {
                                        $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE user_id = ? ORDER BY id_resi DESC");
                                        $stmt->bind_param("s", $user1);
                                    }
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
                                        <?php if (has_access($allowed_super_admin)) { ?>
                                            <td class="small text-center d-flex">

                                                <a href="delete.php?id=<?= $data['id_resi'] ?>" class="btn btn-danger btn-sm mr-2">Tutup</a>
                                            </td>
                                        <?php } ?>
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