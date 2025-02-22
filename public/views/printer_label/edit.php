<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM printer_label WHERE id_printer = ?";
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
                    <h5 class="mb-0">FORM EDIT PRINTER</h5>
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
                            <div class="card-title">Form Edit Data PRINTER</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Form-->
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Printer_controller.php">
                            <!--begin::Body-->
                            <div class="card-body">
                                <!--begin::Row-->
                                <div class="row g-3">
                                    <!--begin::Col-->
                                    <input type="hidden" name="id_printer" value="<?= htmlspecialchars($data['id_printer']) ?>" required />
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label">Cabang Counter</label>
                                        <select class="form-select" id="validationCustom01" name="cabang" aria-label="Default select example" required>
                                            <!-- Tampilkan cabang yang sudah dipilih -->
                                            <option value="<?= htmlspecialchars($data['cabang']) ?>">
                                                <?= htmlspecialchars($data['cabang']) ?>
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

                                    <!-- Input Nama Counter -->
                                    <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label">TYPE PRINTER</label>
                                        <select class="form-select" id="type_printer" name="type_printer" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['type_printer']) ?>"><?= $data['type_printer']; ?></option>
                                            <option value="OX - 130">OX - 130</option>
                                            <option value="CP - 2240">CP - 2240</option>
                                        </select>
                                    </div>

                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label">UNIT</label>
                                        <select class="form-select" id="unit" name="unit" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['unit']) ?>"><?= $data['unit']; ?></option>
                                            <?php
                                            $no = 1;
                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_unit") or die(mysqli_error($koneksi));
                                            $result = array();
                                            while ($unit = mysqli_fetch_array($sql)) {
                                                $result[] = $unit;
                                            }
                                            foreach ($result as $unit) {
                                            ?>
                                                <option value="<?= $unit['nama_unit'] ?>"><?= $no++; ?>. <?= $unit['nama_unit'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">PIC</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="pic" value="<?= htmlspecialchars($data['pic']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom04" class="form-label">SERIAL NUMBER</label>
                                        <input type="text" class="form-control" id="validationCustom04" name="serial_number" value="<?= htmlspecialchars($data['serial_number']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom04" class="form-label">STATUS PRINTER</label>
                                        <select class="form-select" id="status_printer" name="status_printer" aria-label="Default select example" required>
                                            <option value="<?= htmlspecialchars($data['status_printer']) ?>"><?= $data['status_printer'] ?></option>
                                            <option value="BAGUS">BAGUS</option>
                                            <option value="RUSAK">RUSAK</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label">KERUSAKAN</label>
                                        <input type="text" class="form-control" id="validationCustom06" name="kerusakan" value="<?= htmlspecialchars($data['kerusakan']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">TGL KIRIM</label>
                                        <input type="date" class="form-control" id="validationCustom07" name="tgl_kirim" value="<?= htmlspecialchars($data['tgl_kirim']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label">TGL TERIMA</label>
                                        <input type="date" class="form-control" id="validationCustom07" name="tgl_terima" value="<?= htmlspecialchars($data['tgl_terima']) ?>" />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label">KETERANGAN</label>
                                        <input type="text" class="form-control" id="validationCustom06" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" name="edit_printer">Submit form</button>
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
    <strong>
        Copyright &copy; 2024
        <a href="#">IT JNE MEDAN</a>.
    </strong>
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