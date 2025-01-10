<?php
include '../../../app/Config/koneksi.php';
?>
<html>

<head>
    <title>Download</title>
    <link rel="shortcut icon" href="../../../app/Asset/img/jne/JNE.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="container">
        <h2>DATA ASSET</h2>
        <div class="data-tables datatable-dark">
            <table id="mauexport" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="small text-center">PC NAME</th>
                        <th class="small text-center">FLEET</th>
                        <th class="small text-center">DIVISI</th>
                        <th class="small text-center">PIC</th>
                        <th class="small text-center">TYPE</th>
                        <th class="small text-center">BRAND</th>
                        <th class="small text-center">MODEL</th>
                        <th class="small text-center">SERIAL NUMBER</th>
                        <th class="small text-center">SITEM OPERASI</th>
                        <th class="small text-center">LICENSE OS</th>
                        <th class="small text-center">OFFICE</th>
                        <th class="small text-center">LICENSE OFFICE</th>
                        <th class="small text-center">ANTIVIRUS</th>
                        <th class="small text-center">LICENSE ANTIVIRUS</th>
                        <th class="small text-center">OTHER_SOFTWARE</th>
                        <th class="small text-center">LICENSE SOFTWARE</th>
                        <th class="small text-center">MAINTENED BY</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_asset ") or die(mysqli_error($koneksi));
                    $result = array();
                    while ($data = mysqli_fetch_array($sql)) {
                        $result[] = $data;
                    }
                    foreach ($result as $data) {
                        $no++;
                    ?>
                        <tr>
                            <td class="small text-center"><?= $data['pc_name'] ?></td>
                            <td class="small text-center"><?= $data['fleet'] ?></td>
                            <td class="small text-center"><?= $data['divisi_asset'] ?></td>
                            <td class="small text-center"><?= $data['pic_asset'] ?></td>
                            <td class="small text-center"><?= $data['type_asset'] ?></td>
                            <td class="small text-center"><?= $data['brand_asset'] ?></td>
                            <td class="small text-center"><?= $data['model_asset'] ?></td>
                            <td class="small text-center"><?= $data['sn_asset'] ?></td>
                            <td class="small text-center"><?= $data['os_asset'] ?></td>
                            <td class="small text-center"><?= $data['license_os'] ?></td>
                            <td class="small text-center"><?= $data['office_asset'] ?></td>
                            <td class="small text-center"><?= $data['license_office'] ?></td>
                            <td class="small text-center"><?= $data['antivirus'] ?></td>
                            <td class="small text-center"><?= $data['license_antivirus'] ?></td>
                            <td class="small text-center"><?= $data['other_software'] ?></td>
                            <td class="small text-center"><?= $data['license_other'] ?></td>
                            <td class="small text-center"><?= $data['maintained'] ?></td>
                        <?php } ?>
                        </tr>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#mauexport').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>

</html>