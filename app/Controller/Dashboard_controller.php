<?php
session_name("itbase_session");
session_start();

require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['edit_counter'])) {
    $id_cabang = mysqli_real_escape_string($koneksi, $_POST['id_cabang']);
    $id = mysqli_real_escape_string($koneksi, $_POST['id_counter']);
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama_counter']));
    $cust_id = trim(mysqli_real_escape_string($koneksi, $_POST['cust_id']));
    $origin = trim(mysqli_real_escape_string($koneksi, $_POST['origin']));
    $pic = trim(mysqli_real_escape_string($koneksi, $_POST['pic']));
    $phone = trim(mysqli_real_escape_string($koneksi, $_POST['phone']));
    $sistem = trim(mysqli_real_escape_string($koneksi, $_POST['sistem']));
    $printer = intval($_POST['printer']); // Pastikan hanya angka
    $datekey = trim(mysqli_real_escape_string($koneksi, $_POST['datekey']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));

    // Buat query update
    $query = "UPDATE tb_counter SET 
        cabang_counter='$cabang', 
        nama_counter='$nama', 
        cust_id='$cust_id', 
        origin='$origin',
        pic='$pic', 
        phone='$phone', 
        sistem='$sistem', 
        printer=$printer, 
        datekey='$datekey', 
        status='$status'  
        WHERE id_counter='$id'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Simpan id_cabang ke SESSION
        $_SESSION['id_cabang'] = $id_cabang;

        // Redirect ke index.php
        showSweetAlert('success', 'Sukses', 'Counter berhasil diupdate!', '#3085d6', '../../public/views/dashboard/index.php');
    } else {
        // Jika gagal, tampilkan pesan error dari MySQL
        $errorMessage = mysqli_error($koneksi);
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan: ' . $errorMessage, '#d33', '../../public/views/dashboard/home.php');
    }
} else if (isset($_POST['tutup_counter'])) {
    $id = trim(mysqli_real_escape_string($koneksi, $_POST['id_counter']));
    $cabang = trim(mysqli_real_escape_string($koneksi, $_POST['cabang']));
    $status = trim(mysqli_real_escape_string($koneksi, $_POST['status']));
    $tutup = trim(mysqli_real_escape_string($koneksi, $_POST['date_tutup']));

    // Buat query update
    $query = "UPDATE tb_counter SET  
        status='$status',
         tutup='$tutup'
        WHERE id_counter='$id'";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Menentukan halaman tujuan berdasarkan cabang
        $redirectPage = "dashboard/" . strtolower(str_replace(' ', '_', $cabang)) . ".php";
        showSweetAlert('success', 'Sukses', 'Counter berhasil ditutup!', '#3085d6', '../../public/views/' . $redirectPage);
    } else {
        // Jika gagal, tampilkan pesan error dari MySQL
        $errorMessage = mysqli_error($koneksi);
        showSweetAlert('error', 'Gagal', 'Terjadi kesalahan: ' . $errorMessage, '#d33', '../../public/views/dashboard/home.php');
    }
}
