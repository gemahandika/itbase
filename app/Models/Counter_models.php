<?php
// Query pertama: Menghitung total jumlah data dengan status != 'KP'
$sql1 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status != 'KP'";
$result1 = $koneksi->query($sql1);
$total_jumlah = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result1->num_rows > 0) {
    // Ambil hasil
    $row1 = $result1->fetch_assoc();
    $total_jumlah = $row1['total_jumlah']; // Masukkan hasil ke variabel
}

// Query kedua: Menghitung total jumlah data dengan origin = 'MES10000' dan status != 'KP'
$sql2 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE origin = 'MES10000' AND status != 'KP'";
$result2 = $koneksi->query($sql2);
$agen_mes1 = 0; // Variabel untuk menyimpan hasil dari query kedua
if ($result2->num_rows > 0) {
    // Ambil hasil
    $row2 = $result2->fetch_assoc();
    $agen_mes1 = $row2['total_jumlah']; // Masukkan hasil ke variabel
}

// Query kedua: Menghitung total jumlah data dengan origin = 'MES10000' dan status != 'KP'
$sql3 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE origin != 'MES10000' AND status != 'KP'";
$result3 = $koneksi->query($sql3);
$agen_mes2 = 0; // Variabel untuk menyimpan hasil dari query kedua
if ($result3->num_rows > 0) {
    // Ambil hasil
    $row3 = $result3->fetch_assoc();
    $agen_mes2 = $row3['total_jumlah']; // Masukkan hasil ke variabel
}

// Query ketiga: Menghitung total jumlah data dengan datekey di bulan saat ini
$current_month = date('Y-m'); // Format: YYYY-MM
$sql4 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE DATE_FORMAT(datekey, '%Y-%m') = '$current_month'";
$result4 = $koneksi->query($sql4);
$data_bulan_ini = 0; // Variabel untuk menyimpan hasil dari query ketiga
if ($result4->num_rows > 0) {
    // Ambil hasil
    $row4 = $result4->fetch_assoc();
    $data_bulan_ini = $row4['total_jumlah']; // Masukkan hasil ke variabel
}

// ============================================================
$sql5 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'KP'";
$result5 = $koneksi->query($sql5);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result5->num_rows > 0) {
    // Ambil hasil
    $row5 = $result5->fetch_assoc();
    $total_kp = $row5['total_jumlah']; // Masukkan hasil ke variabel
}

$sql6 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'TUTUP'";
$result6 = $koneksi->query($sql6);
$agen_tutup = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result6->num_rows > 0) {
    // Ambil hasil
    $row6 = $result6->fetch_assoc();
    $agen_tutup = $row6['total_jumlah']; // Masukkan hasil ke variabel
}
