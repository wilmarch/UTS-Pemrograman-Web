<?php 
include 'koneksi.php';

session_start();

$id  = $_SESSION['member_id'];

$nama  = $_POST['nama'];
$email  = $_POST['email'];
$hp  = $_POST['hp'];
$alamat  = $_POST['alamat'];


// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($filename==""){
	mysqli_query($koneksi, "update member set member_nama='$nama', member_email='$email', member_hp='$hp', member_alamat='$alamat' where member_id='$id'");
	header("location:member_profil.php?alert=berhasil");
}else{
	if(!in_array($ext,$allowed) ) {
		header("location:member_profil.php.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/member/'.$rand.'_'.$filename);
		$x = $rand.'_'.$filename;
		mysqli_query($koneksi, "update member set member_nama='$nama', member_email='$email', member_hp='$hp', member_alamat='$alamat', member_foto='$x' where member_id='$id'");		
		header("location:member_profil.php?alert=berhasil");
	}
}
