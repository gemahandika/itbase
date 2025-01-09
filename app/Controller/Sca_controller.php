<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_sca'])) {
    $kurir_id = trim(mysqli_real_escape_string($koneksi, $_POST['kurir_id']));
    $password_sca = trim(mysqli_real_escape_string($koneksi, $_POST['password_sca']));
    $fullname_sca = trim(mysqli_real_escape_string($koneksi, $_POST['fullname_sca']));
    $nik_sca = trim(mysqli_real_escape_string($koneksi, $_POST['nik_sca']));
    $phone_sca = trim(mysqli_real_escape_string($koneksi, $_POST['phone_sca']));
    $zona_sca = trim(mysqli_real_escape_string($koneksi, $_POST['zona_sca']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $status_sca = trim(mysqli_real_escape_string($koneksi, $_POST['status_sca']));
    $jobtask_sca = trim(mysqli_real_escape_string($koneksi, $_POST['jobtask_sca']));

    // Validasi Username agar tidak ganda
    $check_query = "SELECT * FROM tb_sca WHERE kurir_id = '$kurir_id'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/sca/index.php');
    } else {

        // Masukan data ke tabel anggota
        mysqli_query($koneksi, "INSERT INTO tb_sca ( kurir_id, password_sca , fullname_sca, nik_sca, phone_sca, zona_sca, cabang_sca,status_sca,jobtask_sca) 
    VALUES( '$kurir_id', '$password_sca', '$fullname_sca', '$nik_sca', '$phone_sca','$zona_sca','$cabang','$status_sca','$jobtask_sca')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/sca/index.php');
    }
} else if (isset($_POST['edit_sca'])) {
    $id = $_POST['id_sca'];
    $kurir_id = trim(mysqli_real_escape_string($koneksi, $_POST['kurir_id']));
    $password_sca = trim(mysqli_real_escape_string($koneksi, $_POST['password_sca']));
    $fullname_sca = trim(mysqli_real_escape_string($koneksi, $_POST['fullname_sca']));
    $nik_sca = trim(mysqli_real_escape_string($koneksi, $_POST['nik_sca']));
    $phone_sca = trim(mysqli_real_escape_string($koneksi, $_POST['phone_sca']));
    $zona_sca = trim(mysqli_real_escape_string($koneksi, $_POST['zona_sca']));
    $cabang_sca = trim(mysqli_real_escape_string($koneksi, $_POST['cabang_sca']));
    $status_sca = trim(mysqli_real_escape_string($koneksi, $_POST['status_sca']));
    $jobtask_sca = trim(mysqli_real_escape_string($koneksi, $_POST['jobtask_sca']));


    mysqli_query($koneksi, "UPDATE tb_sca SET kurir_id='$kurir_id', password_sca='$password_sca', fullname_sca='$fullname_sca', nik_sca='$nik_sca',
    phone_sca='$phone_sca', zona_sca='$zona_sca', cabang_sca='$cabang_sca', status_sca='$status_sca', jobtask_sca='$jobtask_sca'  WHERE id_sca='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/sca/index.php');
}
