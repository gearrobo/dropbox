<?php
// CNK GATEWAY
// documentasi CNK GATEWAY
$host = "localhost";
$username = "root";
$password = "root";
$db = "wa_project";
//error_reporting(0);
$koneksi = mysqli_connect($host, $username, $password, $db) or die("Not Connectedd");
$koneksi->set_charset('utf8mb4');
$base_url = "http://localhost/wa/";
date_default_timezone_set('Asia/Jakarta');
