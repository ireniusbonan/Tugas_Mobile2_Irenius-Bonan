<?php
    define('HOST', 'localhost');
    define('USER', 'root');
    define('DB','crud_rest_api');
    // Password disesuaikan dengan akses ke database masing-masing
    define('PASS', '');
    $conn = new mysqli(HOST, USER, PASS, DB) or die('koneksi error untuk mengakses database');
?>