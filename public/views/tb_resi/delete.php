<!-- SweetAlert CSS -->
<link rel="stylesheet" href="../../../app/Asset/sweetalert/dist/sweetalert2.min.css">

<!-- SweetAlert JS -->
<script src="../../../app/Asset/sweetalert/dist/sweetalert2.all.min.js"></script>

<?php
include '../../../app/Config/koneksi.php';

$tujuan_index = "index.php";

if (isset($_GET['confirm']) && $_GET['confirm'] == 'yes' && isset($_GET['id'])) {
    // Jika pengguna telah mengkonfirmasi penghapusan
    $id_resi = $_GET['id'];
    $query = "DELETE FROM tb_resi WHERE id_resi = '$id_resi'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil dihapus.',
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '$tujuan_index';
                    }
                });
            });
        </script>";
    } else {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Terjadi kesalahan saat menghapus data.',
                    confirmButtonColor: '#dc3545',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location = '$tujuan_index';
                    }
                });
            });
        </script>";
    }
} elseif (isset($_GET['id'])) {
    // Jika pengguna baru saja memulai proses penghapusan
    $id_maintenance = $_GET['id'];
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Hapus Data',
                text: 'Apakah Anda Ingin Menghapus Data ini ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Reload halaman dengan konfirmasi
                    window.location = '?id=$id_maintenance&confirm=yes';
                } else {
                    // Jika dibatalkan, kembali ke halaman utama
                    window.location = '$tujuan_index';
                }
            });
        });
    </script>";
}
?>