<?php
include 'koneksi.php';
$email = $_POST['email'];
$password = md5($_POST['password']);
$konfirmasi_password = md5($_POST['konfirmasi_password']);
$cek_email = mysqli_query($koneksi, "SELECT * FROM member WHERE member_email = '$email'");
if (mysqli_num_rows($cek_email) > 0) {
  if ($password == $konfirmasi_password) {
    $update = mysqli_query($koneksi, "UPDATE member SET member_password = '$password' WHERE member_email = '$email'");
    if ($update) {
      header("location:ganti_password.php?alert=berhasil");
    } else {
      header("location:ganti_password.php?alert=gagal");
    }
  } else {
    header("location:ganti_password.php?alert=gagal");
  }
} else {
  header("location:ganti_password.php?alert=gagal");
}
?>
