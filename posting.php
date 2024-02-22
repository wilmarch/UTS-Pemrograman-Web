<?php include 'header.php'; ?>


<div class="container-fluid">

  <div class="row">

    <div class="col-lg-9">

      <div class="card">
        <div class="card-header">
          <h6 class="m-0">Tulis Posting Diskusi Baru</h6>
        </div>
        <div class="card-body">


          <form action="posting_act.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Judul Diskusi</label>
              <input type="text" class="form-control" required="required" name="judul" placeholder="Masukkan judul diskusi ..">
            </div>

            <div class="form-group">
              <label for="">Kategori Diskusi</label>
              <select name="kategori" class="form-control" required="required">
                <option value="">- Pilih Kategori Diskusi</option>
                <?php 
                $data = mysqli_query($koneksi,"select * from kategori");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <option value="<?php echo $d['kategori_id'] ?>"><?php echo $d['kategori_nama'] ?></option>
                  <?php 
                }
                ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Diskusi</label>
              <textarea id="editor_forum" required="required" name="isi" placeholder="Masukkan isi diskusi .."></textarea>
            </div>

            <div class="form-group">

              <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-notification">Posting Diskusi</button>
              
              <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                  <div class="modal-content bg-gradient-danger">
                    <div class="modal-header">
                      <h6 class="modal-title" id="modal-title-notification">Perhatian!</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">APAKAH ANDA YAKIN INGIN MEMPOSTING DISKUSI INI ?</h4>
                        <p>Klik 'Oke, Posting Sekarang!' untuk memposting diskusi, dan klik 'Batalkan' untuk membatalkan posting.</p>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Batalkan</button>
                      <input type="submit" class="btn btn-white" value="Oke, Posting Sekarang!">
                    </div>
                  </div>
                </div>
              </div>

              
            </div>

          </form>


        </div>
      </div>

    </div>

    <?php include 'sidebar.php'; ?>

  </div>
</div>

<?php include 'footer.php'; ?>
