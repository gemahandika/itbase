<?php
session_name("itbase_session");
session_start();

// Jika sudah login, redirect ke halaman index
if (isset($_SESSION['admin_username'])) {
  header("location:../index.php");
  exit();
}

include '../../../app/Config/koneksi.php';

$username = "";
$password = "";
$err = "";

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validasi input kosong
  if (empty($username) || empty($password)) {
    $err = "Silahkan Masukan Username dan Password";
  } else {
    // Query untuk mendapatkan user berdasarkan username
    $sql1 = "SELECT * FROM user WHERE username = ?";
    $stmt1 = mysqli_prepare($koneksi, $sql1);

    if ($stmt1) {
      mysqli_stmt_bind_param($stmt1, "s", $username);
      mysqli_stmt_execute($stmt1);

      $result1 = mysqli_stmt_get_result($stmt1);

      // Validasi akun ditemukan dan password sesuai
      if ($result1->num_rows === 0) {
        $err = "Akun Anda Tidak ditemukan";
      } else {
        $row = $result1->fetch_assoc();

        // Periksa password menggunakan md5
        if ($row['password'] !== md5($password)) {
          $err = "Password Anda Salah";
        } else {
          // Query untuk mendapatkan akses user
          $login_id = $row['login_id'];
          $sql2 = "SELECT akses_id FROM admin_akses WHERE login_id = ?";
          $stmt2 = mysqli_prepare($koneksi, $sql2);

          if ($stmt2) {
            mysqli_stmt_bind_param($stmt2, "s", $login_id);
            mysqli_stmt_execute($stmt2);

            $result2 = mysqli_stmt_get_result($stmt2);

            $akses = [];
            while ($row2 = $result2->fetch_assoc()) {
              $akses[] = $row2['akses_id'];
            }

            // Validasi akses tidak kosong
            if (empty($akses)) {
              $err = "Kamu Tidak Punya Akses";
            } else {
              // Set session dan redirect
              $_SESSION['admin_username'] = $username;
              $_SESSION['admin_akses'] = $akses;
              header("location:../index.php");
              exit();
            }
          } else {
            $err = "Kesalahan pada prepared statement 2";
          }
        }
      }
    } else {
      $err = "Kesalahan pada prepared statement 1";
    }
  }
}
?>
<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>ITBASE | Login</title>
  <!--begin::Primary Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="title" content="AdminLTE 4 | Login Page" />
  <meta name="author" content="ColorlibHQ" />
  <meta
    name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS." />
  <meta
    name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!--end::Primary Meta Tags-->
  <!--begin::Fonts-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
    integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
    crossorigin="anonymous" />
  <!--end::Fonts-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
    integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="../../../app/Asset/css/adminlte.css" />
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="login-page bg-body-secondary">
  <div class="login-box">
    <div class="login-logo d-flex justify-content-center align-items-center">
      <a href="#" class="d-flex align-items-center text-decoration-none">
        <b class="me-2">IT BASE</b>
        <img src="../../../app/Asset/img/jne/JNE.png" alt="Logo" class="img-fluid" style="height: 40px;">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>
        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username" />
            <div class="input-group-text"><span class="bi bi-people"></span></div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" />
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-4">
              <div class="d-grid gap-2">
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
          <div class="social-auth-links text-center mb-3 d-grid gap-2">
            <p class="text-center small text-danger">
              <?php
              if ($err) {
                echo "$err";
              }
              ?>
            </p>
            <p>- - - - -</p>
            <button type="submit" class="btn btn-primary" name="login"> Login</button>

          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.login-box -->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="../../../dist/js/adminlte.js"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <!--end::OverlayScrollbars Configure-->
  <!--end::Script-->
</body>
<!--end::Body-->

</html>