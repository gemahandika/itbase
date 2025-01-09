<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM tb_sca WHERE id_sca = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah data ditemukan
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan.";
        exit;
    }
} else {
    echo "Akses tidak valid.";
    exit;
}




?>

<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">FORM EDIT ID KURIR</h5>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
                <!--begin::Col-->
                <div class="col-md-12">
                    <!--begin::Quick Example-->

                    <!--begin::Form Validation-->
                    <div class="card card-info card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Form Edit Data Agen & KP</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Sca_controller.php">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Row-->
                                <div class="row g-3">
                                    <!--begin::Col-->
                                    <input type="hidden" name="id_sca" value="<?= htmlspecialchars($data['id_sca']) ?>" required />
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">ID Kurir</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="kurir_id"
                                            value="<?= htmlspecialchars($data['kurir_id']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label">Password</label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="password_sca" value="<?= htmlspecialchars($data['password_sca']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">Fullname</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="fullname_sca" value="<?= htmlspecialchars($data['fullname_sca']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom04" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="nik_sca" value="<?= htmlspecialchars($data['nik_sca']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label">Phone</label>
                                        <input type="number" class="form-control" id="validationCustom06" name="phone_sca" value="<?= htmlspecialchars($data['phone_sca']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">Zona</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="zona_sca" value="<?= htmlspecialchars($data['zona_sca']) ?>" required />
                                    </div>

                                    <div class="col-md-4">

                                        <label for="validationCustom01" class="form-label">Cabang Kurir</label>
                                        <select class="form-select" id="validationCustom01" name="cabang_sca" aria-label="Default select example" required>
                                            <!-- Tampilkan cabang yang sudah dipilih -->
                                            <option value="<?= htmlspecialchars($data['cabang_sca']) ?>">
                                                <?= htmlspecialchars($data['cabang_sca']) ?>
                                            </option>
                                            <?php
                                            $no = 1;
                                            $sqlCabang = mysqli_query($koneksi, "SELECT * FROM tb_cabang") or die(mysqli_error($koneksi));
                                            $cabangList = array();
                                            while ($rowCabang = mysqli_fetch_array($sqlCabang)) {
                                                $cabangList[] = $rowCabang;
                                            }
                                            foreach ($cabangList as $cabang) {
                                            ?>
                                                <option value="<?= htmlspecialchars($cabang['nama_cabang']) ?>">
                                                    <?= $no++; ?>. <?= htmlspecialchars($cabang['nama_cabang']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom05" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status_sca" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['status_sca']) ?>"><?= htmlspecialchars($data['status_sca']) ?></option>
                                            <option value="AGEN">AGEN</option>
                                            <option value="KCU">KCU</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">Jobtask</label>
                                        <select class="form-select" id="jobtask_sca" name="jobtask_sca" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['jobtask_sca']) ?>"><?= htmlspecialchars($data['jobtask_sca']) ?></option>
                                            <option value="PICKUP">PICKUP</option>
                                            <option value="DELIVERY">DELIVERY</option>
                                            <option value="PICKUP DELIVERY">PICKUP DELIVERY</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit" name="edit_sca">Submit form</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (() => {
                                'use strict';

                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                const forms = document.querySelectorAll('.needs-validation');

                                // Loop over them and prevent submission
                                Array.from(forms).forEach((form) => {
                                    form.addEventListener(
                                        'submit',
                                        (event) => {
                                            if (!form.checkValidity()) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }

                                            form.classList.add('was-validated');
                                        },
                                        false,
                                    );
                                });
                            })();
                        </script>
                        <!--end::JavaScript-->
                    </div>
                    <!--end::Form Validation-->
                </div>
                <!--end::Col-->
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
<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->

</html>