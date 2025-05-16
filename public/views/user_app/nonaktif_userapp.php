<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM user WHERE login_id = ?";
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
                    <h5 class="mb-0">NONAKTIF USER APLIKASI</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Userapp_controller.php">
                            <div class="card-body">
                                <div class="row g-3">
                                    <input type="hidden" name="id" value="<?= htmlspecialchars($data['login_id']) ?>" required />
                                    <input type="hidden" name="role" value="NONAKTIF" required />
                                    <input type="hidden" id="password" name="password" value="123" readonly>
                                    <div class="col-md-2">
                                        <label for="validationCustomUsername" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="nik"
                                            value="<?= htmlspecialchars($data['nik']) ?>" required readonly />
                                    </div>

                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="form-label">Cabang User</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="cabang"
                                            value="<?= htmlspecialchars($data['cabang']) ?>" required readonly />
                                    </div>

                                    <div class="col-md-3">
                                        <label for="validationCustom02" class="form-label">Nama User</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="nama_user"
                                            value="<?= htmlspecialchars($data['nama_user']) ?>" required readonly />
                                    </div>

                                    <div class="col-md-2">
                                        <label for="validationCustom03" class="form-label">Unit</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="unit"
                                            value="<?= htmlspecialchars($data['unit']) ?>" required readonly />
                                    </div>

                                    <div class="col-md-2">
                                        <label for="validationCustom04" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="username"
                                            value="<?= htmlspecialchars($data['username']) ?>" required readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-danger" type="submit" name="nonaktif_userapp">Nonaktif</button>
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