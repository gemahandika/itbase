<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header btn-success">
                <h6 class="modal-title" id="exampleModalLabel">TAMBAH DATA KURIR SCA</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Sca_controller.php" method="post">
                <div class="modal-body">

                    <div class="form-group" style="font-size: 14px;">
                        <label for="recipient-name" class="col-form-label"><b>CABANG KURIR :</b></label>
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
                        <label for="kurir_id" class="col-form-label"><b>ID KURIR :</b></label>
                        <input type="text" class="form-control" id="kurir_id" name="kurir_id" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="password_sca" class="col-form-label"><b>PASSWORD SCA :</b></label>
                        <input type="text" class="form-control" id="password_sca" name="password_sca" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="fullname_sca" class="col-form-label"><b>FULLNAME :</b></label>
                        <input type="text" class="form-control" id="fullname_sca" name="fullname_sca" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="nik_sca" class="col-form-label"><b>NIK :</b></label>
                        <input type="text" class="form-control" id="nik_sca" name="nik_sca" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="phone_sca" class="col-form-label"><b>PHONE :</b></label>
                        <input type="number" class="form-control" id="phone_sca" name="phone_sca" value="0" min="0" required>
                    </div>
                    <div class="form-group" style="font-size: 14px;">
                        <label for="zona_sca" class="col-form-label"><b>ZONA KURIR :</b></label>
                        <input type="text" class="form-control" id="zona_sca" name="zona_sca" required>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="sistem" class="col-form-label"><b>STATUS :</b></label>
                        <select class="form-select" id="status_sca" name="status_sca" aria-label="Default select example" required>
                            <option value="AGEN">AGEN</option>
                            <option value="KCU">KCU</option>
                        </select>
                    </div>

                    <div class="form-group" style="font-size: 14px;">
                        <label for="status" class="col-form-label"><b>JOBTASK :</b></label>
                        <select class="form-select" id="jobtask_sca" name="jobtask_sca" aria-label="Default select example" required>
                            <option value="PICKUP">PICKUP</option>
                            <option value="DELIVERY">DELIVERY</option>
                            <option value="PICKUP DELIVERY">PICKUP DELIVERY</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="create_sca">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>