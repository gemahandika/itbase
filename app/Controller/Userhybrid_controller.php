<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_user'])) {
    $user_id = trim(mysqli_real_escape_string($koneksi, $_POST['user_id']));
    $password = trim(mysqli_real_escape_string($koneksi, $_POST['password']));
    $username = trim(mysqli_real_escape_string($koneksi, $_POST['username']));
    $nik = trim(mysqli_real_escape_string($koneksi, $_POST['nik']));
    $user_origin = trim(mysqli_real_escape_string($koneksi, $_POST['user_origin']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $nama_agen = trim(mysqli_real_escape_string($koneksi, $_POST['nama_agen']));
    $hybrid = trim(mysqli_real_escape_string($koneksi, $_POST['hybrid']));

    // Validasi Username agar tidak ganda
    $check_query = "SELECT * FROM user_hybrid WHERE user_id = '$user_id'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/agen_kp/index.php');
    } else {

        mysqli_query($koneksi, "INSERT INTO user_hybrid ( user_id, password , username, nik, user_origin, cust_id, nama_agen, hybrid) 
    VALUES( '$user_id', '$password', '$username', '$nik', '$user_origin','$cust_id','$nama_agen','$hybrid')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/user_hybrid/index.php');
    }
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
