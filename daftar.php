<?php include 'header.php'; ?>


<div class="container-fluid">

  <div class="row">

    <div class="col-lg-6 offset-lg-3">

      <div class="card">
        <div class="card-header">
          Daftar Member Baru
        </div>
        <div class="card-body">


          <?php 
          if(isset($_GET['alert'])){
            if($_GET['alert'] == "duplikat"){
              ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-inner--icon"><i class="ni ni-bell-55"></i></span>
                <span class="alert-inner--text"><strong>Gagal!</strong> Email sudah pernah digunakan, silahkan gunakan email yang lain!</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <?php
            }
          }
          ?>

          <form action="daftar_act.php" method="post">
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" required="required" name="nama" placeholder="Masukkan nama lengkap ..">
            </div>

            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" required="required" name="email" placeholder="Masukkan email ..">
            </div>

            <div class="form-group">
              <label for="">Nomor HP / Whatsapp</label>
              <input type="number" class="form-control" required="required" name="hp" placeholder="Masukkan nomor HP/Whatsapp ..">
            </div>

            <div class="form-group">
              <label for="">Alamat Lengkap</label>
              <input type="text" class="form-control" required="required" name="alamat" placeholder="Masukkan alamat lengkap ..">
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" required="required" name="password" placeholder="Masukkan password ..">
              <small class="text-muted">Password ini digunakan untuk login ke akun anda.</small>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Daftar">
              <p class="btn btn-link btn-block">Sudah punya akun? <a href="masuk.php" class="text-danger">Login</a></p>
            </div>
          </form>

        </div>
      </div>

    </div>

  </div>
</div>

<?php include 'footer.php'; ?>
