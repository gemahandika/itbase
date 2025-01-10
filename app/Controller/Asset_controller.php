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
} else if (isset($_POST['edit_asset'])) {
    $id = $_POST['id_asset'];
    $divisi_asset = trim(mysqli_real_escape_string($koneksi, $_POST['divisi_asset']));
    $pic_asset = trim(mysqli_real_escape_string($koneksi, $_POST['pic_asset']));
    $type_asset = trim(mysqli_real_escape_string($koneksi, $_POST['type_asset']));
    $brand_asset = trim(mysqli_real_escape_string($koneksi, $_POST['brand_asset']));
    $model_asset = trim(mysqli_real_escape_string($koneksi, $_POST['model_asset']));
    $sn_asset = trim(mysqli_real_escape_string($koneksi, $_POST['sn_asset']));
    $os_asset = trim(mysqli_real_escape_string($koneksi, $_POST['os_asset']));
    $license_os = trim(mysqli_real_escape_string($koneksi, $_POST['license_os']));
    $office_asset = trim(mysqli_real_escape_string($koneksi, $_POST['office_asset']));
    $license_office = trim(mysqli_real_escape_string($koneksi, $_POST['license_office']));
    $antivirus = trim(mysqli_real_escape_string($koneksi, $_POST['antivirus']));
    $license_antivirus = trim(mysqli_real_escape_string($koneksi, $_POST['license_antivirus']));
    $other_software = trim(mysqli_real_escape_string($koneksi, $_POST['other_software']));
    $license_other = trim(mysqli_real_escape_string($koneksi, $_POST['license_other']));
    $pc_name = trim(mysqli_real_escape_string($koneksi, $_POST['pc_name']));
    $fleet = trim(mysqli_real_escape_string($koneksi, $_POST['fleet']));


    mysqli_query($koneksi, "UPDATE tb_asset SET divisi_asset='$divisi_asset', pic_asset='$pic_asset', type_asset='$type_asset', brand_asset='$brand_asset',
    model_asset='$model_asset', sn_asset='$sn_asset', os_asset='$os_asset', license_os='$license_os', office_asset='$office_asset', license_office='$license_office',
     antivirus='$antivirus', license_antivirus='$license_antivirus', other_software='$other_software', license_other='$license_other', pc_name='$pc_name', fleet='$fleet' WHERE id_asset='$id'");
    showSweetAlert('success', 'Sukses', $pesan_update, '#3085d6', '../../public/views/tb_asset/index.php');
}
