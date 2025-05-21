<?php
session_name("itbase_session");
session_start();
include '../../header.php';
// include 'modal_printer.php';
$datetime = date('Y-m-d H:i');
// include 'edit_modal.php';

?>

<main class="app-main">
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row" style="border-bottom: 2px solid #000; padding-bottom: 5px;">
                <div class="col-sm-6">
                    <h5 class="mb-0">PROFILE USER</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <form action="../../../app/Controller/Profile_controller.php" method="POST" id="formUpdatePassword" autocomplete="off">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="nama_user" class="form-label">Fullname :</label>
                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?= $nama ?>" required readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="username" class="form-label">User ID</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $user1 ?>" required readonly>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="password" class="form-label">Password New</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" autocomplete="new-password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">👁️</button>
                            </div>
                            <small id="strengthMessage" class="text-danger d-block mt-1"></small>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_password')">👁️</button>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="submit" class="btn btn-info mr-2">Proses</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
</div>

<?php include '../../footer.php'; ?>