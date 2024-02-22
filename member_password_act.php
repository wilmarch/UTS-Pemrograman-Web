<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';

session_start();

$id = $_SESSION['member_id'];
$password = md5($_POST['password']);

mysqli_query($koneksi,"update member set member_password='$password' where member_id='$id'");

header("location:member_password.php?alert=sukses");