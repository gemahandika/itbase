<?php
session_name("itbase_session");
session_start();
include '../../header.php';
// Ambil ID yang dikirim melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    // Query untuk mengambil data dari tb_counter berdasarkan ID
    $sql = "SELECT * FROM maintenance WHERE id_maintenance = ?";
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
                    <h5 class="mb-0">FORM EDIT MAINTENANCE</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <form class="needs-validation" novalidate method="post" action="../../../app/Controller/Maintenance_controller.php">
                            <div class="card-body">
                                <div class="row g-3">
                                    <input type="hidden" name="id_maintenance" value="<?= htmlspecialchars($data['id_maintenance']) ?>" required />
                                    <div class="col-md-4">
                                        <label for="validationCustom01" class="form-label"><b>CABANG <span class="text-danger"> *</span></b></label>
                                        <select class="form-select" id="validationCustom01" name="cabang" aria-label="Default select example" required>
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


                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label"><b>TYPE MAINTENANCE<span class="text-danger"> *</span></b></b></label>
                                        <input type="text" class="form-control" id="validationCustomUsername" name="type_maintenance"
                                            value="<?= htmlspecialchars($data['type_maintenance']) ?>" required />
                                    </div>
                                    <!--end::Col-->
                                    <!--begin::Col-->
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label"><b>JENIS MAINTENANCE<span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom03" name="jenis_maintenance"
                                            value="<?= htmlspecialchars($data['jenis_maintenance']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom06" class="form-label"><b>UNIT<span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom06" name="unit"
                                            value="<?= htmlspecialchars($data['unit']) ?>" required />
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>PIC REQUEST <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="pic_request"
                                            value="<?= htmlspecialchars($data['pic_request']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>TGL REQUEST <span class="text-danger"> *</span></b></label>
                                        <input type="date" class="form-control" id="validationCustom07" name="tgl_request"
                                            value="<?= htmlspecialchars($data['tgl_request']) ?>" required />
                                    </div>

                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>PROBLEM <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="problem"
                                            value="<?= htmlspecialchars($data['problem']) ?>" required />
                                    </div>



                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>TGL SOLVED <span class="text-danger"> *</span></b></label>
                                        <input type="date" class="form-control" id="validationCustom07" name="tgl_solved"
                                            value="<?= htmlspecialchars($data['tgl_solved']) ?>" required />
                                    </div>



                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>PIC PROSES <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="pic_proses"
                                            value="<?= htmlspecialchars($data['pic_proses']) ?>" required />
                                    </div>



                                    <div class="col-md-4">
                                        <label for="validationCustom07" class="form-label"><b>KETERANGAN <span class="text-danger"> *</span></b></label>
                                        <input type="text" class="form-control" id="validationCustom07" name="keterangan"
                                            value="<?= htmlspecialchars($data['keterangan']) ?>" required />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-info" type="submit" name="edit_maintenance">Update Data</button>
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