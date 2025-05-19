<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['add_resi'])) {
    $no_resi = trim(mysqli_real_escape_string($koneksi, $_POST['no_resi']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));
    $tgl_req = trim(mysqli_real_escape_string($koneksi, $_POST['tgl_req']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $nama_agen = trim(mysqli_real_escape_string($koneksi, $_POST['nama_agen']));
    $user_id = trim(mysqli_real_escape_string($koneksi, $_POST['user_id']));

    $check_query = "SELECT * FROM tb_resi WHERE status = 'OPEN' AND no_resi = '$no_resi'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/tb_resi/index.php');
    } else {
        mysqli_query($koneksi, "INSERT INTO tb_resi ( no_resi, nama_agen, user_id, status , keterangan, tgl_req) 
    VALUES( '$no_resi', '$nama_agen', '$user_id', '$status', '$keterangan', '$tgl_req')");
        showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/tb_resi/index.php');
    }
} else if (isset($_POST['edit_resi'])) {
    $id = $_POST['id_resi'];
    $no_resi = trim(mysqli_real_escape_string($koneksi, $_POST['no_resi']));
    $keterangan = trim(mysqli_real_escape_string($koneksi, $_POST['keterangan']));

    $check_query = "SELECT * FROM tb_resi WHERE no_resi = '$no_resi' AND id_resi != '$id'";
    $check_result = $koneksi->query($check_query);
    if ($check_result->num_rows > 0) {
        $pesan = "Nomor resi sudah digunakan oleh data lain!";
        showSweetAlert('warning', 'Oops...', $pesan, '#3085d6', '../../public/views/tb_resi/index.php');
    } else {
        mysqli_query($koneksi, "UPDATE tb_resi SET no_resi='$no_resi', keterangan='$keterangan' WHERE id_resi='$id'");
        $pesan_update = "Data berhasil diperbarui!";
        showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/tb_resi/index.php');
    }
}
