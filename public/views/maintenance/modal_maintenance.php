<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <h6 class="modal-title" id="exampleModalLabel">FORM MAINTENANCE</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Maintenance_controller.php" method="post">
                <div class="modal-body">

                    <div class="form-group" style="font-size: 14px;">
                        <label for="recipient-name" class="col-form-label"><b>CABANG <span class="text-danger"> *</span></b></label>
                        <select class="form-select" id="cabang" name="cabang" aria-label="Default select example" required>
                            <option value="">- Pilih Cabang -</option>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                            ?>
                                <option value="<?= $data['nama_cabang'] ?>"><?= $no++; ?>. <?= $data['nama_cabang'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="type_maintenance" class="col-form-label"><b>TYPE MAINTENANCE <span class="text-danger"> *</span></b></label>
                        <select class="form-select" id="type_maintenance" name="type_maintenance" aria-label="Default select example" required>
                            <option value="SOFTWARE">SOFTWARE</option>
                            <option value="HARDWARE">HARDWARE</option>
                        </select>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="jenis_maintenance" class="col-form-label"><b>JENIS MAINTENANCE <span class="text-danger"> *</span></b></label>
                        <input type="text" class="form-control" id="jenis_maintenance" name="jenis_maintenance" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="unit" class="col-form-label"><b>UNIT <span class="text-danger"> *</span></b></label>
                        <select class="form-select" id="unit" name="unit" aria-label="Default select example" required>
                            <option value="">- Pilih Unit -</option>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_unit") or die(mysqli_error($koneksi));
                            $result = array();
                            while ($data = mysqli_fetch_array($sql)) {
                                $result[] = $data;
                            }
                            foreach ($result as $data) {
                            ?>
                                <option value="<?= $data['nama_unit'] ?>"><?= $no++; ?>. <?= $data['nama_unit'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="pic_request" class="col-form-label"><b>PIC REQUEST <span class="text-danger"> *</span></b></label>
                        <input type="text" class="form-control" id="pic_request" name="pic_request" required>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="tgl_request" class="col-form-label"><b>TANGGAL REQ <span class="text-danger"> *</span></b>:</label>
                        <input type="date" class="form-control" id="tgl_request" name="tgl_request" value="<?= $date ?>" required>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="problem" class="col-form-label"><b>PROBLEM <span class="text-danger"> *</span></b></label>
                        <input type="text" class="form-control" id="problem" name="problem" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="tgl_solved" class="col-form-label"><b>TANGGAL SOLVED <span class="text-danger"> *</span></b></label>
                        <input type="date" class="form-control" id="tgl_solved" name="tgl_solved" value="<?= $date ?>" required>
                    </div>
                    <input type="hidden" class="form-control" id="pic_proses" name="pic_proses" value="<?= $nama ?>" required>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="keterangan" class="col-form-label"><b>KETERANGAN <span class="text-danger"> *</span></b></label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" name="create_maintenance">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>