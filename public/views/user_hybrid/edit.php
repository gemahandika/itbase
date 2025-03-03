<?php
session_name("itbase_session");
session_start();
include '../../header.php';
// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM user_hybrid WHERE id_hybrid = ?";
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
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">FORM EDIT USER HYBRID</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Userhybrid_controller.php">
                            <div class="card-body">
                                <div class="row g-3">
                                    <input type="hidden" name="id_hybrid" value="<?= htmlspecialchars($data['id_hybrid']) ?>" required />
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label"><b>USER ID <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="user_id"
                                            value="<?= htmlspecialchars($data['user_id']) ?>" required />
                                    </div>


                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label"><b>PASSWORD<span class="text-danger"> *</span></b></b></label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="password"
                                            value="<?= htmlspecialchars($data['password']) ?>" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label"><b>FULLNAME<span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom03" name="username"
                                            value="<?= htmlspecialchars($data['username']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label"><b>NIK<span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom06" name="nik"
                                            value="<?= htmlspecialchars($data['nik']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>ORIGIN <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="user_origin"
                                            value="<?= htmlspecialchars($data['user_origin']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>CUST ID <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="cust_id"
                                            value="<?= htmlspecialchars($data['cust_id']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>NAMA AGEN <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="nama_agen"
                                            value="<?= htmlspecialchars($data['nama_agen']) ?>" required />
                                    </div>



                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>HYBRID <span class="text-danger"> *</span></b></label>
                                        <select class="form-select" id="validationCustom01" name="hybrid" aria-label="Default select example" required>
                                            <!-- Tampilkan cabang yang sudah dipilih -->
                                            <option value="<?= htmlspecialchars($data['hybrid']) ?>">
                                                <?= htmlspecialchars($data['hybrid']) ?>
                                            </option>
                                            <option value="AGEN">AGEN </option>
                                            <option value="KP">KP </option>
                                            <option value="GERAI">GERAI </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" name="edit_userhybrid">Update Data</button>
                            </div>
                        </form>
                        <script>
                            (() => {
                                'use strict';
                                const forms = document.querySelectorAll('.needs-validation');
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<script src="../../../app/Asset/js/adminlte.js"></script>
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
</body>

</html>