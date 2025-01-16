<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_agen'])) {
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $sistem = trim(mysqli_real_escape_string($koneksi, $_POST['sistem']));
    $printer = trim(mysqli_real_escape_string($koneksi, $_POST['printer']));
    $datekey = trim(mysqli_real_escape_string($koneksi, $_POST['datekey']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "INSERT INTO tb_counter ( cabang_counter, nama_counter , cust_id, origin, pic, phone, sistem, printer, datekey, status) 
    VALUES( '$cabang', '$nama', '$cust_id', '$origin', '$pic', '$phone', '$sistem',$printer,'$datekey','$status')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/agen_kp/index.php');
} else if (isset($_POST['edit_counter'])) {
    $id = $_POST['id_counter'];
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama_counter']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $sistem = trim(mysqli_real_escape_string($koneksi, $_POST['sistem']));
    $printer = trim(mysqli_real_escape_string($koneksi, $_POST['printer']));
    $datekey = trim(mysqli_real_escape_string($koneksi, $_POST['datekey']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    mysqli_query($koneksi, "UPDATE tb_counter SET cabang_counter='$cabang', nama_counter='$nama', cust_id='$cust_id', origin='$origin',
    pic='$pic', phone='$phone', sistem='$sistem', printer=$printer, datekey='$datekey', status='$status'  WHERE id_counter='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/agen_kp/index.php');
} else if (isset($_POST['Tutup_counter'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id_counter']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $tutup = trim(mysqli_real_escape_string($koneksi, $_POST['date_tutup']));

    mysqli_query($koneksi, "UPDATE tb_counter SET status='$status' , tutup='$tutup' WHERE id_counter='$id'");
    showSweetAlert('success', 'Sukses', 'Agen Berhasil Di Tutup', '#ff0000', '../../public/views/agen_kp/agen_tutup.php');
}
