<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <h6 class="modal-title" id="exampleModalLabel">FORM PRINTER LABEL</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Printer_controller.php" method="post">

                <div class="modal-body">
                    <div class="form-group" style="font-size: 14px;">
                        <label for="type_printer" class="col-form-label"><b>TYPE PRINTER <span class="text-danger">*</span></b></label>
                        <select class="form-select" id="type_printer" name="type_printer" aria-label="Default select example" required>
                            <option value="OX - 130">OX - 130</option>
                            <option value="CP - 2240">CP - 2240</option>
                        </select>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="recipient-name" class="col-form-label"><b>CABANG <span class="text-danger">*</span></b></label>
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
                        <label for="recipient-name" class="col-form-label"><b>UNIT <span class="text-danger">*</span></b></label>
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
                        <label for="pic" class="col-form-label"><b>PIC <span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" id="pic" name="pic" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="serial_number" class="col-form-label"><b>SERIAL NUMBER <span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" id="serial_number" name="serial_number" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="status_printer" class="col-form-label"><b>STATUS PRINTER <span class="text-danger">*</span></b></label>
                        <select class="form-select" id="status_printer" name="status_printer" aria-label="Default select example" required>
                            <option value="BAGUS">BAGUS</option>
                            <option value="RUSAK">RUSAK</option>
                        </select>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="kerusakan" class="col-form-label"><b>KERUSAKAN <span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" id="kerusakan" name="kerusakan" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="tgl_kirim" class="col-form-label"><b>TGL KIRIM <span class="text-danger">*</span></b></label>
                        <input type="date" class="form-control" id="tgl_kirim" name="tgl_kirim" value="<?= $date ?>" required>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="keterangan" class="col-form-label"><b>KETERANGAN <span class="text-danger">*</span></b></label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create_printer">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>