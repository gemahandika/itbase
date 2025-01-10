<?php
session_name("itbase_session");
session_start();
require '../../../vendor/autoload.php';
include '../../header.php';


use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['upload'])) {
    $file = $_FILES['file']['tmp_name'];
    if ($file) {
        $spreadsheet = IOFactory::load($file);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        for ($row = 2; $row <= $highestRow; $row++) {
            $divisi_asset = trim($worksheet->getCell('A' . $row)->getValue());
            $pic_asset = trim($worksheet->getCell('B' . $row)->getValue());
            $type_asset = trim($worksheet->getCell('C' . $row)->getValue());
            $brand_asset = trim($worksheet->getCell('D' . $row)->getValue());
            $model_asset = trim($worksheet->getCell('E' . $row)->getValue());
            $sn_asset = trim($worksheet->getCell('F' . $row)->getValue());
            $os_asset = trim($worksheet->getCell('G' . $row)->getValue());
            $license_os = trim($worksheet->getCell('H' . $row)->getValue());
            $office_asset = trim($worksheet->getCell('I' . $row)->getValue());
            $license_office = trim($worksheet->getCell('J' . $row)->getValue());
            $antivirus = trim($worksheet->getCell('K' . $row)->getValue());
            $license_antivirus = trim($worksheet->getCell('L' . $row)->getValue());
            $other_software = trim($worksheet->getCell('M' . $row)->getValue());
            $license_other = trim($worksheet->getCell('N' . $row)->getValue());
            $maintained = trim($worksheet->getCell('O' . $row)->getValue());
            $pc_name = trim($worksheet->getCell('P' . $row)->getValue());
            $fleet = trim($worksheet->getCell('Q' . $row)->getValue());

            // Simpan data ke database
            $stmt = $koneksi->prepare("INSERT INTO tb_asset (divisi_asset, pic_asset, type_asset, brand_asset, model_asset, sn_asset, os_asset, license_os, office_asset, license_office, antivirus, license_antivirus, other_software,
            license_other, maintained, pc_name, fleet) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "sssssssssssssssss",
                $divisi_asset,
                $pic_asset,
                $type_asset,
                $brand_asset,
                $model_asset,
                $sn_asset,
                $os_asset,
                $license_os,
                $office_asset,
                $license_office,
                $antivirus,
                $license_antivirus,
                $other_software,
                $license_other,
                $maintained,
                $pc_name,
                $fleet
            );
            $stmt->execute();
        }
        // Notifikasi sukses
        echo "<script>
        swal({
            title: 'Berhasil!',
            text: 'Data berhasil diimpor!',
            icon: 'success'
        });
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 1000); // 1 detik
      </script>";
    } else {
        // Notifikasi gagal
        echo "<script>
                swal({
                    title: 'Gagal!',
                    text: 'Gagal mengunggah file!',
                    icon: 'error'
                });
              </script>";
    }
}
?>
<!-- SweetAlert CSS -->
<link rel="stylesheet" href="../../../app/Asset/sweetalert/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="../../../app/Asset/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- Form untuk mengimpor file -->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">FORM UPLOAD ID KURIR</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-primary">
                        Silahkan Pilih File untuk di export sesuai template .
                    </div>
                </div>

                <form action="" method="post" enctype="multipart/form-data" class="mt-4">
                    <div class="form-group">
                        <label for="file">File Excel:</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <button type="submit" name="upload" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</main>


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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable(); // Ganti #example dengan ID tabel Anda
    });
</script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<!--end::OverlayScrollbars Configure-->
<!--end::Script-->
</body>
<!--end::Body-->

</html>