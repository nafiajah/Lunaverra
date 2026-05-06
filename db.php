<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'Lunaverra';

    $conn = mysqli_connect("localhost", "root", "", "Lunaverra");

    if (mysqli_connect_errno()) {
        echo "Koneksi database gagal: " . mysqli_connect_error();
    }