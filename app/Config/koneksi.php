<?php
// koneksi local
$koneksi = mysqli_connect('localhost', 'root', '', 'db_itbase');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
