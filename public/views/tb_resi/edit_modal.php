<?php
include '../../../app/config/koneksi.php'; // koneksi database

if (isset($_GET['id_resi']) && isset($_GET['mode'])) {
    $id_resi = $_GET['id_resi'];
    $mode = $_GET['mode'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_resi WHERE id_resi = '$id_resi'");
    $data = mysqli_fetch_assoc($query);
?>

    <div class="modal-header btn-info">
        <h6 class="modal-title" id="exampleModalLabel">FORM EDIT RESI CANCEL</h6>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="../../../app/Controller/Resi_controller.php" method="post">
        <div class="modal-body">
            <!-- Hidden ID -->
            <input type="hidden" name="id_resi" value="<?= $data['id_resi'] ?>">

            <!-- Field No Resi -->
            <div class="form-group" style="font-size: 14px;">
                <label for="no_resi"><b>NOMOR RESI <span class="text-danger">*</span></b></label>
                <input type="text" class="form-control" id="no_resi" name="no_resi" value="<?= $data['no_resi'] ?>" required>
            </div>

            <!-- Field Keterangan Cancel -->
            <div class="form-group" style="font-size: 14px;">
                <label for="keterangan"><b>KETERANGAN CANCEL <span class="text-danger">*</span></b></label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $data['keterangan'] ?? '' ?>" required>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info" name="edit_resi">Edit Data</button>
        </div>
    </form>

<?php } ?>