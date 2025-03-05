<?php
// koneksi local
// $koneksi = mysqli_connect('localhost', 'root', '', 'db_itbase');
// if (mysqli_connect_errno()) {
//     echo mysqli_connect_error();
// }

// koneksi public
$koneksi = mysqli_connect('localhost', 'jnee6778_mesit', 'Jnemes2017', 'jnee6778_itbase');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
