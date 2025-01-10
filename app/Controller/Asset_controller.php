<?php
require_once "../Config/koneksi.php";
require_once "../Asset/sweetalert/dist/func_sweetAlert.php";

if (isset($_POST['create_asset'])) {
    $pc_name = trim(mysqli_real_escape_string($koneksi, $_POST['pc_name']));
    $fleet = trim(mysqli_real_escape_string($koneksi, $_POST['fleet']));
    // Masukan data ke tabel anggota
    mysqli_query($koneksi, "INSERT INTO tb_asset ( pc_name, fleet) 
    VALUES( '$pc_name', '$fleet')");
    showSweetAlert('success', 'Sukses', $pesan_ok, '#3085d6', '../../public/views/tb_asset/index.php');
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
