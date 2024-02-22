<?php 
include 'koneksi.php';
session_start();

date_default_timezone_set('Asia/Jakarta');

$tanggal = date('Y/m/d H:i:s');
$member = $_SESSION['member_id'];
$kategori  = $_POST['kategori'];
$judul  = $_POST['judul'];
$isi  = $_POST['isi'];
$dibaca  = 0;

mysqli_query($koneksi, "insert into posting values (NULL,'$tanggal','$member','$kategori','$judul','$isi','$dibaca')");

header("location:index.php?alert=posting");
