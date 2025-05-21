<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($koneksi, $_POST['confirm_password']);

    // Validasi: password dan konfirmasi harus sama
    if ($password !== $confirm_password) {
        echo "<script>alert('Password dan konfirmasi tidak cocok!'); window.location.href='../../public/views/profile/index.php';</script>";
        exit;
    }

    // Hash password dengan MD5 (sementara, agar sesuai dengan sistem login sekarang)
    $hashed_password = md5($password);

    // Update ke database
    $update = mysqli_query($koneksi, "UPDATE user SET password = '$hashed_password' WHERE username = '$username'");

    if ($update) {
        echo "<script>alert('Password berhasil diupdate.'); window.location.href='../../public/views/profile/index.php';</script>";
    } else {
        echo "<script>alert('Gagal update password.'); window.location.href='../../public/views/profile/index.php';</script>";
    }
}
