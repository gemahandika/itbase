<?php
include '../../../app/Config/koneksi.php';
?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../../../app/Controller/Userapp_controller.php" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="fullname" class="col-form-label">Fullname</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="nik" class="col-form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cabang</label>
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
                    <div class="form-group">
                        <label for="unit" class="col-form-label">Unit</label>
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
                    <div class="form-group">
                        <label for="username" class="col-form-label">Username:</label>
                        <input class="form-control" id="username" name="username" required></input>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="text" class="form-control" id="password" name="password" password>
                    </div>
                    <input type="hidden" id="status" name="status" value="nonaktif" password>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_user">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>