<?php include 'header.php'; ?>

<div class="container">
  <div class="row">
    <div class="col-lg-4 offset-lg-4">
      <div class="card">
        <div class="card-header">
          Ganti Password
        </div>
        <div class="card-body">
          <?php
          if (isset($_GET['alert'])) {
            if ($_GET['alert'] == "gagal") {
          ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Email tidak terdaftar atau password salah!</strong> coba lagi!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
            <?php
            } elseif ($_GET['alert'] == "berhasil") {
            ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Password berhasil diubah!</strong> Silahkan login!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
          <?php
            }
          }
          ?>
          <form action="ganti_password_act.php" method="post">
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email ..">
            </div>
            <div class="form-group">
              <label for="">Password Baru</label>
              <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password baru ..">
            </div>
            <div class="form-group">
              <label for="">Konfirmasi Password Baru</label>
              <input type="password" class="form-control" required="required" name="konfirmasi_password" placeholder="Masukkan konfirmasi password baru ..">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>