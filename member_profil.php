<?php include 'header.php'; ?>


<div class="container">

  <div class="row">

    <?php include 'member_menu.php'; ?>

    <div class="col-lg-9">

      <div class="card">
        <div class="card-header">
          <h6 class="m-0">Profil</h6>
        </div>
        <div class="card-body">





          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "berhasil"){
              echo "<div class='alert alert-success'>Profil anda berhasil diubah.</div>";
            }else if($_GET['alert'] == "gagal"){
              echo "<div class='alert alert-danger'>Profil gagal diubah. file gambar tidak diizinkan.</div>";
            }
          }
          ?>

          <?php 
          $id = $_SESSION['member_id'];
          $member = mysqli_query($koneksi,"select * from member where member_id='$id'");
          while($i = mysqli_fetch_array($member)){
            ?>

            <form action="member_profil_update.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" required="required" name="nama" placeholder="Masukkan nama .." value="<?php echo $i['member_nama'] ?>">
              </div>

              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email .." value="<?php echo $i['member_email'] ?>">
              </div>

              <div class="form-group">
                <label for="">HP</label>
                <input type="number" class="form-control" required="required" name="hp" placeholder="Masukkan no.hp .." value="<?php echo $i['member_hp'] ?>">
              </div>

              <div class="form-group">
                <label for="">Alamat</label>
                <input type="text" class="form-control" required="required" name="alamat" placeholder="Masukkan alamat .." value="<?php echo $i['member_alamat'] ?>">
              </div>

              <div class="form-group">
                <label for="">Foto Profil</label>
                <input type="file" name="foto">
                <Br/>
                <i><small>Kosongkan jika tidak ingin mengubah foto profil.</small></i>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ubah Profil">
              </div>
            </form>


            <?php 
          }
          ?>

          <br/>

        </div>
      </div>

    </div>


  </div>
</div>

<?php include 'footer.php'; ?>
