<?php
session_name("itbase_session");
session_start();
include '../../header.php';

// include 'modal_counter.php';
// $cabang_pilihan = isset($_GET['sistem']) ? urldecode($_GET['sistem']) : '';


?>


<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">DATA USER ORION HYBRID</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4 p-2">
                        <div class="d-flex">
                            <button type="button" class="btn btn-info mb-4 mr-2">Download</button>
                        </div>
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr class="btn-secondary">
                                    <th class="small text-center">NO</th>
                                    <th class="small text-center">USER ID</th>
                                    <th class="small text-center">PASSWORD</th>
                                    <th class="small text-center">FULLNAME</th>
                                    <th class="small text-center">NIK</th>
                                    <th class="small text-center">ORIGIN</th>
                                    <th class="small text-center">CUST ID</th>
                                    <th class="small text-center">NAMA AGEN</th>
                                    <th class="small text-center">HYBRID</th>
                                    <th class="small text-center">ACTION</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $no = 0;
                                $sql = mysqli_query($koneksi, "SELECT * FROM user_hybrid ORDER BY id_hybrid DESC") or die(mysqli_error($koneksi));
                                $result = array();
                                while ($data = mysqli_fetch_array($sql)) {
                                    $result[] = $data;
                                }
                                foreach ($result as $data) {
                                    $no++;
                                ?>

                                    <tr>
                                        <td class="small text-center"><?= $no; ?></td>
                                        <td class="small text-center"><?= $data['user_id'] ?></td>
                                        <td class="small text-center"><?= $data['password'] ?></td>
                                        <td class="small text-center"><?= $data['username'] ?></td>
                                        <td class="small text-center"><?= $data['nik'] ?></td>
                                        <td class="small text-center"><?= $data['user_origin'] ?></td>
                                        <td class="small text-center"><?= $data['cust_id'] ?></td>
                                        <td class="small text-center"><?= $data['nama_agen'] ?></td>
                                        <td class="small text-center"><?= $data['hybrid'] ?></td>
                                        <td class="small text-center d-flex">
                                            <div class="d-flex justify-content-center align-items-center mt-3">
                                                <form action="edit.php" method="post" style="display:inline;">
                                                    <input type="hidden" name="id" value="<?= $data['id_hybrid'] ?>">
                                                    <button type="submit" class="btn btn-info btn-sm text-white mr-2">
                                                        <i class="bi bi-pencil"></i> Edit
                                                    </button>
                                                </form>
                                                <a href="delete.php?id=<?= $data['id_hybrid'] ?>" class="btn btn-secondary btn-sm mr-2"> <i class="bi bi-trash"></i>Hapus</a>
                                            </div>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            responsive: true, // Membuat tabel responsif
            scrollX: true // Mengaktifkan scroll horizontal jika tabel terlalu lebar
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>