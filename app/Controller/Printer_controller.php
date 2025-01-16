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
} else if (isset($_POST['edit_maintenance'])) {
    $id = $_POST['id_maintenance'];
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $type_maintenance = trim(mysqli_real_escape_string($koneksi, $_POST['type_maintenance']));
    $jenis_maintenance = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_maintenance']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $pic_request = trim(mysqli_real_escape_string($koneksi, $_POST['pic_request']));
    $tgl_request = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_request']));
    $problem = trim(mysqli_real_escape_string($koneksi, $_POST['problem']));
    $tgl_solved = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_solved']));
    $pic_proses = trim(mysqli_real_escape_string($koneksi, $_POST['pic_proses']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    mysqli_query($koneksi, "UPDATE maintenance SET cabang='$cabang', type_maintenance='$type_maintenance', jenis_maintenance='$jenis_maintenance', unit='$unit',
    pic_request='$pic_request', tgl_request='$tgl_request', problem='$problem', tgl_solved='$tgl_solved', pic_proses='$pic_proses', keterangan='$keterangan'  WHERE id_maintenance='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/maintenance/index.php');
}
