<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_printer'])) {
    $type_printer = trim(mysqli_real_escape_string($koneksi, $_POST['type_printer']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $serial_number = trim(mysqli_real_escape_string($koneksi, $_POST['serial_number']));
    $status_printer = trim(mysqli_real_escape_string($koneksi, $_POST['status_printer']));
    $kerusakan = trim(mysqli_real_escape_string($koneksi, $_POST['kerusakan']));
    $tgl_kirim = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_kirim']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    mysqli_query($koneksi, "INSERT INTO printer_label ( type_printer, cabang , unit, pic, serial_number, status_printer, kerusakan, tgl_kirim, keterangan) 
    VALUES( '$type_printer', '$cabang', '$unit', '$pic', '$serial_number','$status_printer','$kerusakan','$tgl_kirim','$keterangan')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/printer_label/index.php');
} else if (isset($_POST['edit_printer'])) {
    $id = $_POST['id_printer'];
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $type_printer = trim(mysqli_real_escape_string($koneksi, $_POST['type_printer']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $serial_number = trim(mysqli_real_escape_string($koneksi, $_POST['serial_number']));
    $status_printer = trim(mysqli_real_escape_string($koneksi, $_POST['status_printer']));
    $kerusakan = trim(mysqli_real_escape_string($koneksi, $_POST['kerusakan']));
    $tgl_kirim = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_kirim']));
    $tgl_terima = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_terima']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    mysqli_query($koneksi, "UPDATE printer_label SET type_printer='$type_printer', cabang='$cabang', unit='$unit', pic='$pic',
    serial_number='$serial_number', status_printer='$status_printer', kerusakan='$kerusakan', tgl_kirim='$tgl_kirim', tgl_terima='$tgl_terima', keterangan='$keterangan'  WHERE id_printer='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/printer_label/index.php');
}
