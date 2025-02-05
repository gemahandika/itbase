<?php
// Query pertama: Menghitung total jumlah AGEN
$sql1 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'AGEN' AND cabang_counter = 'CABANG BINJAI'";
$result1 = $koneksi->query($sql1);
$total_jumlah = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result1->num_rows > 0) {
    // Ambil hasil
    $row1 = $result1->fetch_assoc();
    $agen_medan = $row1['total_jumlah']; // Masukkan hasil ke variabel
}

// Menghitung total jumlah KP
$sql2 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'KP' AND cabang_counter = 'CABANG BINJAI'";
$result2 = $koneksi->query($sql2);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result2->num_rows > 0) {
    // Ambil hasil
    $row2 = $result2->fetch_assoc();
    $kp_medan = $row2['total_jumlah']; // Masukkan hasil ke variabel
}

// Menghitung total jumlah ONLINE
$sql3 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'AGEN' AND cabang_counter = 'CABANG BINJAI' AND sistem != 'OFFLINE'";
$result3 = $koneksi->query($sql3);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result3->num_rows > 0) {
    // Ambil hasil
    $row3 = $result3->fetch_assoc();
    $online_medan = $row3['total_jumlah']; // Masukkan hasil ke variabel
}

// Menghitung total jumlah OFFLINE
$sql4 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'AGEN' AND cabang_counter = 'CABANG BINJAI' AND sistem = 'OFFLINE'";
$result4 = $koneksi->query($sql4);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result4->num_rows > 0) {
    // Ambil hasil
    $row4 = $result4->fetch_assoc();
    $offline_medan = $row4['total_jumlah']; // Masukkan hasil ke variabel
}

// Menghitung total jumlah KHUSU HYBRID
$sql5 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'AGEN' AND cabang_counter = 'CABANG BINJAI' AND sistem = 'HYBRID'";
$result5 = $koneksi->query($sql5);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result5->num_rows > 0) {
    // Ambil hasil
    $row5 = $result5->fetch_assoc();
    $hybrid_medan = $row5['total_jumlah']; // Masukkan hasil ke variabel
}

// Menghitung total jumlah KHUSU HYBRID
$sql6 = "SELECT COUNT(*) AS total_jumlah FROM tb_counter WHERE status = 'AGEN' AND cabang_counter = 'CABANG BINJAI' AND sistem = 'MEC'";
$result6 = $koneksi->query($sql6);
$total_kp = 0; // Variabel untuk menyimpan hasil dari query pertama
if ($result6->num_rows > 0) {
    // Ambil hasil
    $row6 = $result6->fetch_assoc();
    $mec_medan = $row6['total_jumlah']; // Masukkan hasil ke variabel
}
// Konversi ke JSON untuk Chart.js
$labels_json = json_encode(["HYBRID", "MEC"]);
$data_json   = json_encode([$hybrid_medan, $mec_medan]);
