<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM tb_counter WHERE id_counter = ?";
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

                <!--begin::Quick Example-->
                <div class="col-12">
                    <div class="callout callout-danger">
                        Mohon Untuk di cek kembali Agen / KP yang akan di Tutup.
                    </div>
                </div>
                <div class="col-md-12">
                    <!--begin::Form Validation-->
                    <div class="card card-info card-outline mb-4">
                        <!--begin::Header-->
                        <div class="card-header">
                            <div class="card-title">Form Agen / KP Tutup</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Counter_controller.php">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Row-->
                                <div class="row g-3">
                                    <!--begin::Col-->
                                    <input type="hidden" name="id_counter" value="<?= htmlspecialchars($data['id_counter']) ?>" required />
                                    <div class="col-md-3">
                                        <label for="validationCustom01" class="form-label">Cabang Counter</label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="cabang" value="<?= htmlspecialchars($data['cabang_counter']) ?>" required readonly />
                                    </div>

                                    <!-- Input Nama Counter -->
                                    <div class="col-md-3">
                                        <label for="validationCustom02" class="form-label">Nama Counter</label>
                                        <input type="text" class="form-control" id="validationCustom02" name="nama_counter"
                                            value="<?= htmlspecialchars($data['nama_counter']) ?>" required readonly />
                                    </div>


                                    <!--begin::Col-->
                                    <div class="col-md-3">
                                        <label for="validationCustomUsername" class="form-label">Cust ID</label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="cust_id" value="<?= htmlspecialchars($data['cust_id']) ?>" required readonly />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-3">
                                        <label for="validationCustom03" class="form-label">Origin</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="origin" value="<?= htmlspecialchars($data['origin']) ?>" required readonly />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom04" class="form-label">PIC</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="pic" value="<?= htmlspecialchars($data['pic']) ?>" required readonly />
                                    </div>
                                    <div class="col-md-3">
                                        <label for="validationCustom05" class="form-label">System</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="sistem" value="<?= htmlspecialchars($data['sistem']) ?>" required readonly />
                                    </div>
                                    <!--end::Col-->
                                    <div class="col-md-2">
                                        <label for="validationCustom06" class="form-label">Printer</label>
                                        <input type="number" class="form-control" id="validationCustom06" name="printer" value="<?= htmlspecialchars($data['printer']) ?>" required readonly />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom07" class="form-label">Datekey</label>
                                        <input type="date" class="form-control" id="validationCustom07" name="datekey" value="<?= htmlspecialchars($data['datekey']) ?>" required readonly />
                                    </div>
                                    <div class="col-md-2">
                                        <label for="validationCustom08" class="form-label">Status</label>
                                        <input type="text" class="form-control" id="validationCustom07" value="<?= htmlspecialchars($data['status']) ?>" required readonly />
                                    </div>
                                    <input type="hidden" name="status" value="TUTUP" required readonly />
                                    <input type="hidden" name="date_tutup" value="<?= $date ?>" required readonly />
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Body-->
                            <!--begin::Footer-->
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" name="Tutup_counter">Submit</button>
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