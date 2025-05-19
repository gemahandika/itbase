<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include 'modal_userapp.php'
?>
<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Aktivasi User</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Simple Tables</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-3">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr class="btn-secondary">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">NIP</th>
                                    <th class="small text-center">NAMA USER</th>
                                    <th class="small text-center">USERNAME</th>
                                    <th class="small text-center">STATUS</th>
                                    <th class="small text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status = 'NONAKTIF' ORDER BY login_id ASC") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="small text-center" style="font-size: smaller;"><?= $no; ?></td>
                                        <td class="small text-center" style="font-size: smaller;"><?= $data['nik'] ?></td>
                                        <td class="small text-center"><?= $data['nama_user'] ?></td>
                                        <td class="small text-center"><?= $data['username'] ?></td>
                                        <td class="small text-center"><?= strtoupper($data['status']) ?></td>
                                        <td class="small text-center">
                                            <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#aksesModal<?= $data['login_id'] ?>">Aktifkan User</a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit -->
                                    <div class="modal fade" id="aksesModal<?= $data['login_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="../../../app/Controller/Userapp_controller.php" method="post">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-success">
                                                        <h6 class="modal-title fs-5" id="exampleModalLabel" style="color: white;">AKTIFKAN USER</h6>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="report-it">
                                                            <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                                            <div class="label-1 ">
                                                                <label for="cabang"><strong>CABANG :</strong></label><br>
                                                                <input class="form-control form-control-sm" type="text" name="cabang" value="<?= $data['cabang'] ?>" required readonly>
                                                            </div>
                                                            <div class="label-1 mt-4">
                                                                <label for="nik"><strong>NIK :</strong></label><br>
                                                                <input class="form-control form-control-sm" type="text" name="nik" value="<?= $data['nik'] ?>" required readonly>
                                                            </div>
                                                            <div class="label-1 mt-4">
                                                                <label for="nama_user"><strong>FULLNAME :</strong></label><br>
                                                                <input class="form-control form-control-sm" type="text" name="nama_user" value="<?= $data['nama_user'] ?>" required readonly>
                                                            </div>
                                                            <div class="label-1 mt-4">
                                                                <label for="username"><strong>USER ID :</strong></label><br>
                                                                <input class="form-control form-control-sm" type="text" name="username" value="<?= $data['username'] ?>" required readonly>
                                                            </div>

                                                            <input type="hidden" name="password" value="<?= $data['password'] ?>" required readonly>

                                                            <?php if (in_array("sales", $_SESSION['admin_akses'])) { ?>
                                                                <div class="label-1 mt-4">
                                                                    <label for="role"><strong>ROLE</strong></label>
                                                                    <input class="form-control form-control-sm" type="text" name="role" value="agen" required readonly>
                                                                </div>
                                                            <?php } ?>
                                                            <?php if (in_array("super_admin", $_SESSION['admin_akses']) || in_array("admin", $_SESSION['admin_akses'])) { ?>
                                                                <div class="label-1 mt-4">
                                                                    <label for="role"><strong>ROLE</strong></label>
                                                                    <select class="form-control form-control-sm" type="text" name="role" required>
                                                                        <option value="AGEN">AGEN</option>
                                                                        <option value="sales">SALES</option>
                                                                    </select>
                                                                </div>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        <input type="submit" name="aktif_user" class="btn btn-success" style="color: white;" value="Aktifkan">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>

<?php include '../../footer.php'; ?>