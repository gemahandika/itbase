<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include 'modal_userapp.php';
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
                    <h5 class="mb-0">USER APLIKASI</h5>
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
                        <div class="d-flex">
                            <button type="button" class="btn btn-primary mb-2 mr-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
                            <a href="aktivasi.php" type="button" class="btn btn-info mb-2">Aktivasi</a>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr class="btn-secondary">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">NIP</th>
                                    <th class="small text-center">FULLNAME</th>
                                    <th class="small text-center">USERNAME</th>
                                    <th class="small text-center">STATUS</th>
                                    <th class="small text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $akses = $_SESSION['admin_akses'] ?? [];
                                $no = 0;
                                if (in_array("sales", $akses) || in_array("agen", $akses)) {
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status != 'NONAKTIF' AND status = 'AGEN' ORDER BY login_id DESC") or die(mysqli_error($koneksi));
                                } else {
                                    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE status != 'NONAKTIF' ORDER BY login_id DESC") or die(mysqli_error($koneksi));
                                }
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td class="small text-center"><?= $no; ?></td>
                                        <td class="small text-center"><?= $data['nik'] ?></td>
                                        <td class="small text-center"><?= $data['nama_user'] ?></td>
                                        <td class="small text-center"><?= $data['username'] ?></td>
                                        <td class="small text-center"><?= strtoupper($data['status']) ?></td>
                                        <td class="small text-center">
                                            <form action="edit_userapp.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="bi bi-pencil"></i> Edit
                                                </button>
                                            </form>
                                            <form action="nonaktif_userapp.php" method="post" style="display:inline;">
                                                <input type="hidden" name="id" value="<?= $data['login_id'] ?>">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="bi bi-lock"></i> Nonaktif
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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