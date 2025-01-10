<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM tb_asset WHERE id_asset = ?";
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
                    <h5 class="mb-0">FORM EDIT ASSET</h5>
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
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Asset_controller.php">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Row-->
                                <div class="row g-3">
                                    <!--begin::Col-->
                                    <input type="hidden" name="id_asset" value="<?= htmlspecialchars($data['id_asset']) ?>" required />

                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">DIVISI</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="divisi_asset"
                                            value="<?= htmlspecialchars($data['divisi_asset']) ?>" required />
                                    </div>


                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label">PIC</label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="pic_asset"
                                            value="<?= htmlspecialchars($data['pic_asset']) ?>" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">TYPE</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="type_asset"
                                            value="<?= htmlspecialchars($data['type_asset']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom04" class="form-label">BRAND</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="brand_asset"
                                            value="<?= htmlspecialchars($data['brand_asset']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label">MODEL</label>
                                        <input type="text" class="form-control" id="validationCustom06" name="model_asset"
                                            value="<?= htmlspecialchars($data['model_asset']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">SERIAL NUMBER</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="sn_asset"
                                            value="<?= htmlspecialchars($data['sn_asset']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">SITEM OPERASI</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="os_asset"
                                            value="<?= htmlspecialchars($data['os_asset']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">LICENSE OS</label>
                                        <select class="form-select" id="status" name="license_os" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['license_os']) ?>"><?= htmlspecialchars($data['license_os']) ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">OFFICE</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="office_asset"
                                            value="<?= htmlspecialchars($data['office_asset']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">LICENSE OFFICE</label>
                                        <select class="form-select" id="status" name="license_office" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['license_office']) ?>"><?= htmlspecialchars($data['license_office']) ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">ANTIVIRUS</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="antivirus"
                                            value="<?= htmlspecialchars($data['antivirus']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">LICENSE ANTIVIRUS</label>
                                        <select class="form-select" id="status" name="license_antivirus" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['license_antivirus']) ?>"><?= htmlspecialchars($data['license_antivirus']) ?></option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">OTHER_SOFTWARE</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="other_software"
                                            value="<?= htmlspecialchars($data['other_software']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">LICENSE SOFTWARS</label>
                                        <select class="form-select" id="status" name="license_other" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['license_other']) ?>"><?= htmlspecialchars($data['license_other']) ?></option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">PC NAME</label>
                                        <input type="text" class="form-control" id="validationCustom07" name="pc_name"
                                            value="<?= htmlspecialchars($data['pc_name']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom08" class="form-label">FLEET</label>
                                        <select class="form-select" id="status" name="fleet" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['fleet']) ?>"><?= htmlspecialchars($data['fleet']) ?></option>
                                            <option value="YES">YES</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>

                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" name="edit_asset">Submit form</button>
                            </div>
                            <!--end::Footer-->
                        </form>
                        <!--end::Form-->
                        <!--begin::JavaScript-->
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