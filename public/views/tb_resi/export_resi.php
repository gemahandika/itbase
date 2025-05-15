<?php
include '../../../app/Config/Koneksi.php'; // sesuaikan path koneksi kamu

$start_date = $_GET['filter_start'] ?? null;
$end_date = $_GET['filter_end'] ?? null;

// Query SQL berdasarkan filter atau semua data
if ($start_date && $end_date) {
    $start_datetime = $start_date . ' 00:00:00';
    $end_datetime = $end_date . ' 23:59:59';
    $stmt = $koneksi->prepare("SELECT * FROM tb_resi WHERE tgl_req BETWEEN ? AND ? ORDER BY id_resi DESC");
    $stmt->bind_param("ss", $start_datetime, $end_datetime);
} else {
    $stmt = $koneksi->prepare("SELECT * FROM tb_resi ORDER BY id_resi DESC");
}

$stmt->execute();
$result = $stmt->get_result();

// Header untuk file download (CSV contoh)
header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="data_resi.csv"');

// Output file CSV
$output = fopen('php://output', 'w');
fputcsv($output, ['No', 'Nomor Resi', 'Keterangan', 'Nama Agen', 'User ID', 'Tgl Request Cancel', 'Tgl Proses Cancel', 'Status']);

$no = 1;
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $no++,
        $row['no_resi'],
        $row['keterangan'],
        $row['nama_agen'],
        $row['user_id'],
        $row['tgl_req'],
        $row['tgl_proses'],
        $row['status']
    ]);
}

fclose($output);
exit;
