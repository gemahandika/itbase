<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <h6 class="modal-title" id="exampleModalLabel">TAMBAH DATA AGEN / KP</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Counter_controller.php" method="post">
                <div class="modal-body">

                    <div class="form-group" style="font-size: 14px;">
                        <label for="recipient-name" class="col-form-label"><b>CABANG :</b></label>
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
                        <label for="nama" class="col-form-label"><b>AGEN / KP :</b></label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="cust_id" class="col-form-label"><b>CUST ID :</b></label>
                        <input type="text" class="form-control" id="cust_id" name="cust_id" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="origin" class="col-form-label"><b>ORIGIN :</b></label>
                        <input type="text" class="form-control" id="origin" name="origin" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="pic" class="col-form-label"><b>PIC :</b></label>
                        <input type="text" class="form-control" id="pic" name="pic" required>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="sistem" class="col-form-label"><b>SISTEM :</b></label>
                        <select class="form-select" id="sistem" name="sistem" aria-label="Default select example" required>
                            <option value="HYBRID">HYBRID</option>
                            <option value="MEC">MEC</option>
                            <option value="OFFLINE">OFFLINE</option>
                        </select>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="printer" class="col-form-label"><b>PRINTER :</b>:</label>
                        <input type="number" class="form-control" id="printer" name="printer" value="0" min="0" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="datekey" class="col-form-label"><b>DATEKEY :</b></label>
                        <input type="date" class="form-control" id="datekey" name="datekey" value="<?= $date ?>" password>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="status" class="col-form-label"><b>STATUS :</b></label>
                        <select class="form-select" id="status" name="status" aria-label="Default select example" required>
                            <option value="AGEN">AGEN</option>
                            <option value="KP">KP</option>
                            <option value="GERAI">GERAI</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create_agen">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>