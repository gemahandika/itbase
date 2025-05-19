<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_user'])) {
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $fullname = trim(mysqli_real_escape_string($koneksi, $_POST['fullname']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Validasi Username agar tidak ganda
    $check_query = "SELECT * FROM user WHERE username = '$username'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/user_app/index.php');
    } else {

        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO user ( nik, nama_user , cabang, unit, username, password, status) 
    VALUES( '$nik', '$fullname', '$cabang', '$unit', '$username','$password','$status')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/user_app/index.php');
    }
} else if (isset($_POST['aktif_user'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $status = $_POST['role'];
    mysqli_query($koneksi, "UPDATE user SET password=MD5('$password'), status='$status' 
    WHERE login_id='$id'");
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id']));
    $akses = trim(mysqli_real_escape_string($koneksi, $_POST['role']));
    mysqli_query($koneksi, "INSERT INTO admin_akses (login_id, akses_id) VALUES('$id', '$akses')");
    showSweetAlert('success', 'Success', 'User Berhasil Di Aktifkan', '#3085d6', '../../public/views/user_app/aktivasi.php');
} else if (isset($_POST['edit_userapp'])) {
    $id = $_POST['login_id'];
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $nama_user = trim(mysqli_real_escape_string($koneksi, $_POST['nama_user']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $unit = trim(mysqli_real_escape_string($koneksi, $_POST['unit']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    mysqli_query($koneksi, "UPDATE user SET nik='$nik', nama_user='$nama_user', cabang='$cabang', unit='$unit', 
    username='$username'WHERE login_id='$id'");
    showSweetAlert('success', 'Success', 'User Berhasil Update', '#3085d6', '../../public/views/user_app/index.php');
} else if (isset($_POST['nonaktif_userapp'])) {
    $id = $_POST['id'];
    $password = $_POST['password'];
    $status = $_POST['role'];
    mysqli_query($koneksi, "UPDATE user SET password='$password', status='$status' 
    WHERE login_id='$id'");
    $sql = mysqli_query($koneksi, "DELETE FROM admin_akses WHERE login_id = '$id'") or die(mysqli_error($koneksi));
    showSweetAlert('success', 'Success', 'User Berhasil Di Non Aktifkan', '#dc3545', '../../public/views/user_app/aktivasi.php');
}
