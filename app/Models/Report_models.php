<?php

// Query ketiga: Menghitung total jumlah data dengan datekey di bulan saat ini
$current_month = date('Y-m'); // Format: YYYY-MM
$sql4 = "SELECT COUNT(*) AS total_jumlah FROM maintenance WHERE DATE_FORMAT(tgl_request, '%Y-%m') = '$current_month'";
$result4 = $koneksi->query($sql4);
$data_bulan_ini = 0; // Variabel untuk menyimpan hasil dari query ketiga
if ($result4->num_rows > 0) {
    // Ambil hasil
    $row4 = $result4->fetch_assoc();
    $maintenance_bulan_ini = $row4['total_jumlah']; // Masukkan hasil ke variabel
}
