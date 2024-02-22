<?php
// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = $_POST['email'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM member WHERE member_email='$email' AND member_password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	$cek_status = mysqli_query($koneksi, "SELECT * FROM member WHERE member_email='$email' AND member_password='$password' AND member_status='aktif'");
	$cek_status_member = mysqli_num_rows($cek_status);

	if ($cek_status_member > 0) {
		session_start();
		$data = mysqli_fetch_assoc($login);

		// hapus session yg lain, agar tidak bentrok dengan session member
		unset($_SESSION['id']);
		unset($_SESSION['nama']);
		unset($_SESSION['username']);
		unset($_SESSION['status']);

		// buat session member
		$_SESSION['member_id'] = $data['member_id'];
		$_SESSION['member_status'] = "login";
		header("location:member.php");
	} else {
		header("location:masuk.php?alert=banned");
	}
} else {
	header("location:masuk.php?alert=gagal");
}