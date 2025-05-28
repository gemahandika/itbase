<?php
require '../../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

include '../../../app/Config/koneksi.php';  // Koneksi DB

$status = '';
$errorMessage = '';

// Ambil semua no_resi yang status OPEN
$sql = "SELECT no_resi FROM tb_resi WHERE status = 'OPEN'";
$result = $koneksi->query($sql);

if ($result->num_rows === 0) {
    $status = 'empty';
} else {
    // Siapkan daftar no_resi dan array untuk update
    $resi_list = "";
    $no_resi_array = [];

    while ($row = $result->fetch_assoc()) {
        $resi_list .= $row['no_resi'] . "\n";
        $no_resi_array[] = $row['no_resi'];
    }

    // Buat isi email
    $body = "Dear team IT Helpdesk,\n";
    $body .= "Mohon bantuannya untuk mencancel resi berikut ini:\n\n";
    $body .= "Berikut No Resinya:\n";
    $body .= $resi_list . "\n";
    $body .= "Dikarenakan petugas salah entry.\n\n";
    $body .= "Terima Kasih \n";
    $body .= "Gemasyah Handika";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth   = true;
        $mail->Username   = $_ENV['SMTP_USER'];
        $mail->Password   = $_ENV['SMTP_PASS'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port       = $_ENV['SMTP_PORT'];

        $mail->setFrom($_ENV['SMTP_USER'], 'Sistem Resi');
        $mail->addAddress('ithelpdesk@jne.co.id', 'Team IT Helpdesk');
        // Tambahkan CC
        $mail->addCC('mes.it@jne.co.id', 'Team IT');
        $mail->addCC('mes.it1@jne.co.id', 'Team IT');
        $mail->addCC('mes.it2@jne.co.id', 'Team IT');
        $mail->addCC('sigit.suprihandoko@jne.co.id', 'Head IT');
        $mail->isHTML(false); // text biasa
        $mail->Subject = 'Cancel resi orion hybrid';
        $mail->Body    = $body;

        $mail->send();

        // Update status menjadi CLOSED (atau DONE, sesuaikan kebutuhan)
        $date = new DateTime();
        $formattedDate = $date->format('Y-m-d H:i:s'); // format sesuai datetime MySQL
        $no_resi_in = "'" . implode("','", $no_resi_array) . "'";
        $update = "UPDATE tb_resi SET status = 'DONE', tgl_proses = '$formattedDate' WHERE no_resi IN ($no_resi_in)";
        $koneksi->query($update);


        $status = 'success';
    } catch (Exception $e) {
        $status = 'error';
        $errorMessage = $mail->ErrorInfo;
    }
}
?>

<!-- HTML SweetAlert -->
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script>
        <?php if ($status === 'success'): ?>
            Swal.fire({
                icon: 'success',
                title: 'Email berhasil dikirim',
                text: 'Klik OK untuk kembali ke halaman utama'
            }).then(() => {
                window.location.href = 'index.php';
            });
        <?php elseif ($status === 'error'): ?>
            Swal.fire({
                icon: 'error',
                title: 'Gagal mengirim email',
                text: '<?= addslashes($errorMessage) ?>'
            }).then(() => {
                window.location.href = 'index.php';
            });
        <?php else: ?>
            Swal.fire({
                icon: 'info',
                title: 'Tidak ada data OPEN',
                text: 'Tidak ada resi OPEN untuk dikirim.'
            }).then(() => {
                window.location.href = 'index.php';
            });
        <?php endif; ?>
    </script>
</body>

</html>