<?php include 'header.php'; ?>


<div class="container">

  <div class="row">

    <?php include 'member_menu.php'; ?>

    <div class="col-lg-9">

      <div class="card">
        <div class="card-header">
          <h6 class="m-0">Dashboard</h6>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-lg-6">
              <div class="card card-body shadow bg-primary text-white">
                <?php 
                $id_member = $_SESSION['member_id'];
                $posting = mysqli_query($koneksi,"select * from posting where posting_member='$id_member'");
                ?>
                <h4 class="text-white"><?php echo mysqli_num_rows($posting) ?></h4>
                <small>Jumlah Posting/Diskusi Saya</small>
              </div>
            </div>

             <div class="col-lg-6">
              <div class="card card-body shadow bg-success text-white">
                <?php 
                $id_member = $_SESSION['member_id'];
                $diskusi = mysqli_query($koneksi,"select * from diskusi where diskusi_member='$id_member'");
                ?>
                <h4 class="text-white"><?php echo mysqli_num_rows($diskusi) ?></h4>
                <small>Jumlah Komentar Saya Pada Diskusi</small>
              </div>
            </div>
          </div>

          <br/>

        </div>
      </div>

    </div>


  </div>
</div>

<?php include 'footer.php'; ?>
