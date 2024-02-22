<?php include 'header.php'; ?>


<div class="container-fluid">

  <div class="row">

    <div class="col-lg-4 offset-lg-4">

      <div class="card">
        <div class="card-header">
          Login Member
        </div>
        <div class="card-body">
          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "terdaftar"){
              ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Pendaftaran Berhasil.</strong> Silahkan login!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
            }elseif($_GET['alert'] == "gagal"){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Email dan Password salah!</strong> coba lagi!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
            }elseif($_GET['alert'] == "login-dulu"){
              ?>
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Warning!</strong> <br/> Silahkan login terlebih dulu untuk membuat diskusi baru!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
            }elseif($_GET['alert'] == "banned"){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Maaf!</strong> <br/> Akun anda telah dibanned!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
            }
          }
          ?>

          <form action="masuk_act.php" method="post">

            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email ..">
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password ..">
            </div>

            <?php  
            if(isset($_GET['alert'])){
              if($_GET['alert'] == "gagal") {
                ?>
                <!-- tombol -->
                <a href="ganti_password.php">Ganti Password</a>
                <?php
              }
            }
            ?>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Login">
              <a href="daftar.php" class="btn btn-warning pull-right">Daftar</a>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>
</div>

<?php include 'footer.php'; ?>