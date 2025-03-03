<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_maintenance'])) {
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $type_maintenance = trim(mysqli_real_escape_string($koneksi, $_POST['type_maintenance']));
    $jenis_maintenance = trim(mysqli_real_escape_string($koneksi, $_POST['jenis_maintenance']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $pic_request = trim(mysqli_real_escape_string($koneksi, $_POST['pic_request']));
    $tgl_request = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_request']));
    $jam_request = trim(mysqli_real_escape_string($koneksi, $_POST['jam_request']));
    $problem = trim(mysqli_real_escape_string($koneksi, $_POST['problem']));
    $tgl_solved = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_solved']));
    $jam_solved = trim(mysqli_real_escape_string($koneksi, $_POST['jam_solved']));
    $pic_proses = trim(mysqli_real_escape_string($koneksi, $_POST['pic_proses']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    mysqli_query($koneksi, "INSERT INTO maintenance ( cabang, type_maintenance , jenis_maintenance, unit, pic_request, tgl_request, jam_request, problem, tgl_solved, jam_solved, pic_proses, keterangan) 
    VALUES( '$cabang', '$type_maintenance', '$jenis_maintenance', '$unit', '$pic_request','$tgl_request','$jam_request','$problem','$tgl_solved','$jam_solved','$pic_proses','$keterangan')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/maintenance/index.php');
} else if (isset($_POST['edit_userhybrid'])) {
    $id = $_POST['id_hybrid'];
    $user_id = trim(mysqli_real_escape_string($koneksi, $_POST['user_id']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $user_origin = trim(mysqli_real_escape_string($koneksi, $_POST['user_origin']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $nama_agen = trim(mysqli_real_escape_string($koneksi, $_POST['nama_agen']));
    $hybrid = trim(mysqli_real_escape_string($koneksi, $_POST['hybrid']));

    mysqli_query($koneksi, "UPDATE user_hybrid SET user_id='$user_id', password='$password', username='$username', nik='$nik',
    user_origin='$user_origin', cust_id='$cust_id', nama_agen='$nama_agen', hybrid='$hybrid' WHERE id_hybrid='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/user_hybrid/index.php');
}
