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
                            </tbody>
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
                                                    <div class="label-1">
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

                                                    <div class="label-1 mt-4">
                                                        <label for="cabang"><strong>CABANG :</strong></label><br>
                                                        <input class="form-control form-control-sm" type="text" name="cabang" value="<?= $data['cabang'] ?>" required readonly>
                                                    </div>
                                                    <!-- <input type="hidden" name="status" value="NONAKTIF" required readonly> -->
                                                    <div class="label-1 mt-4">
                                                        <label for="role"><strong>ROLE</strong></label>
                                                        <select class="form-control form-control-sm" type="text" name="role" required>
                                                            <option value="agen">AGEN</option>
                                                            <option value="admin">ADMIN</option>
                                                        </select>
                                                    </div>
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
                        </table>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->
<!--begin::Footer-->
<footer class="app-footer">
    <!--begin::To the end-->
    <div class="float-end d-none d-sm-inline">Anything you want</div>
    <!--end::To the end-->
    <!--begin::Copyright-->
    <strong>
        Copyright &copy; 2014-2024&nbsp;
        <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
    </strong>
    All rights reserved.
    <!--end::Copyright-->
</footer>
<!--end::Footer-->
</div>
<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="../../../app/Asset/js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script>
    new DataTable('#example');
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->

</html>