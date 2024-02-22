<!-- ASIDE -->
<div class="col-md-3">


	<?php 
	$id_member = $_SESSION['member_id'];
	$member = mysqli_query($koneksi,"select * from member where member_id='$id_member'");
	$c = mysqli_fetch_assoc($member);

	if($c['member_foto'] == ""){
		?>
		<center><img class="img-fluid rounde shadow" src="gambar/sistem/member.png"></center>
		<?php
	}else{
		?>
		<center><img class="img-fluid rounde shadow" src="gambar/member/<?php echo $c['member_foto'] ?>"></center>
		<?php
	}
	?>

	<center>
		<h5 class="my-4"><?php echo $c['member_nama'];  ?></h5>
	</center>

	<div class="menu">
		<ul class="list-group">
			<li class="list-group-item"><a class="text-default btn-block" href="member.php"> <i class="fa fa-home"></i> &nbsp; <b>Dashboard</b></a></li>
			<li class="list-group-item"><a class="text-default btn-block" href="member_profil.php"> <i class="fa fa-user"></i> &nbsp; <b>Profil Saya</b></a></li>
			<li class="list-group-item"><a class="text-default btn-block" href="member_password.php"> <i class="fa fa-lock"></i> &nbsp; <b>Ganti Password</b></a></li>
			<li class="list-group-item"><a class="text-default btn-block" href="member_logout.php"> <i class="fa fa-sign-out"></i> &nbsp; <b>Keluar</b></a></li>
		</ul>
	</div>
</div>
<!-- /ASIDE -->
