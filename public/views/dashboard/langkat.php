<?php
session_name("itbase_session");
session_start();
include '../../header.php';
include '../../../app/Models/Dashboard_models/Langkat_models.php';
include '../../../app/Models/Report_models.php';
?>
<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Langkat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <?php
            include 'button_cabang.php';
            ?>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Agen</span>
                            <span class="info-box-number">
                                <?= $agen_medan ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-info shadow-sm">
                            <i class="bi bi-hospital-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total KCU</span>
                            <span class="info-box-number">
                                <?= $kp_medan ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-pc-display"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Online</span>
                            <span class="info-box-number">
                                <?= $online_medan ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-danger shadow-sm">
                            <i class="bi bi-pencil-fill"></i>
                        </span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Offline</span>
                            <span class="info-box-number">
                                <?= $offline_medan ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr class="btn-secondary">
                                            <th class="small text-center">NO</th>
                                            <th class="small text-center">NAMA AGEN / KP</th>
                                            <th class="small text-center">CUST ID</th>
                                            <th class="small text-center">ORIGIN</th>
                                            <th class="small text-center">PIC</th>
                                            <th class="small text-center">PHONE</th>
                                            <th class="small text-center">SYSTEM</th>
                                            <th class="small text-center">PRINTER</th>
                                            <th class="small text-center">DATEKEY</th>
                                            <th class="small text-center">STATUS</th>
                                            <th class="small text-center">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        $sql = mysqli_query($koneksi, "SELECT * FROM tb_counter WHERE status != 'TUTUP' AND cabang_counter = 'CABANG LANGKAT' ORDER BY id_counter DESC") or die(mysqli_error($koneksi));
                                        $result = array();
                                        while ($data = mysqli_fetch_array($sql)) {
                                            $result[] = $data;
                                        }
                                        foreach ($result as $data) {
                                            $no++;
                                        ?>
                                            <tr>
                                                <td class="small text-center"><?= $no; ?></td>
                                                <td class="small text-center"><?= $data['nama_counter'] ?></td>
                                                <td class="small text-center"><?= $data['cust_id'] ?></td>
                                                <td class="small text-center"><?= $data['origin'] ?></td>
                                                <td class="small text-center"><?= $data['pic'] ?></td>
                                                <td class="small text-center"><?= $data['phone'] ?></td>
                                                <td class="small text-center"><?= $data['sistem'] ?></td>
                                                <td class="small text-center"><?= $data['printer'] ?></td>
                                                <td class="small text-center"><?= $data['datekey'] ?></td>
                                                <td class="small text-center"><?= $data['status'] ?></td>
                                                <td class="small text-center d-flex">
                                                    <?php if (has_access($allowed_super_admin)) { ?>
                                                        <a href="delete.php?id=<?= $data['id_counter'] ?>" class="btn btn-info btn-sm mr-2">Hapus</a>
                                                    <?php } ?>
                                                    <form action="edit.php" method="post" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm text-white mr-2">
                                                            <i class="bi bi-pencil"></i> Edit
                                                        </button>
                                                    </form>
                                                    <form action="counter_tutup.php" method="post" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?= $data['id_counter'] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-lock"></i> Tutup
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Info Boxes Style 2 -->
                    <div class="info-box mb-3 text-bg-success">
                        <span class="info-box-icon"> <i class="bi bi-pc-display"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text">HYBRID</span>
                            <span class="info-box-number"><?= $hybrid_medan ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                    <div class="info-box mb-3 text-bg-warning">
                        <span class="info-box-icon"> <i class="bi bi-phone-fill"></i> </span>
                        <div class="info-box-content">
                            <span class="info-box-text">MEC</span>
                            <span class="info-box-number"><?= $mec_medan ?></span>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <canvas id="donutChart"></canvas>
                                </div>
                            </div>
                        </div>
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
<script
    src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
    crossorigin="anonymous"></script>
<script>
    // Ambil data dari PHP
    const labels = <?php echo $labels_json; ?>;
    const data = <?php echo $data_json; ?>;

    // Buat Donut Chart dengan Chart.js
    const ctx = document.getElementById('donutChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Agen HYBRID & MEC',
                data: data,
                backgroundColor: ['#36A2EB', '#FF6384'], // Warna untuk HYBRID dan MEC
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                }
            }
        }
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script>
    new DataTable('#example', {
        paging: false,
        scrollCollapse: true,
        scrollY: '400px'
    });
</script>

</body>

</html>