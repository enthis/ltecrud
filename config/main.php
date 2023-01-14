<?php
$server = "localhost"; //nama server
$username = "root"; // username 
$password = ""; //  standarnya kosong
$database = "dbcrud"; // buat nama database harus sama 

// Koneksi dan memilih database di server
$con = mysqli_connect($server,$username,$password) or die("Koneksi gagal");
mysqli_select_db($con,$database) or die("Database tidak bisa dibuka");
?>