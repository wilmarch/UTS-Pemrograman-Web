<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Diskusi / Posting
      <small>Data Diskusi / Posting</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <h3 class="box-title">Diskusi / Posting</h3>
          </div>
          <div class="box-body">

            <div class="table-responsive">


              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th class="col-lg-6">Judul Diskusi</th>
                    <th>Kategori</th>
                    <th>Member</th>
                    <th><i class="fa fa-eye"></i></th>
                    <th><i class="fa fa-comment"></i></th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $data = mysqli_query($koneksi,"select * from posting,kategori,member where posting_member=member_id and kategori_id=posting_kategori order by posting_id desc");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td>
                        <a target="_blank" href="../diskusi.php?id=<?php echo $d['posting_id']; ?>"><?php echo $d['posting_judul'] ?></a>
                        <br/><i><small><?php echo date('d-M-Y H:i:s',strtotime($d['posting_tanggal'])) ?></small></i>
                      </td>
                      <td>
                        <a target="_blank" href="../kategori.php?id=<?php echo $d['kategori_id']; ?>">
                          <div class="badge badge-warning"><?php echo $d['kategori_nama'] ?></div>
                        </a>
                      </td>
                      <td>
                        <a target="_blank" href="../detail_member.php?id=<?php echo $d['member_id']; ?>">
                          <?php 
                          if($d['member_foto'] == ""){
                            ?>
                            <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../gambar/sistem/member.png">
                            <?php
                          }else{
                            ?>
                            <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="../gambar/member/<?php echo $d['member_foto'] ?>">
                            <?php
                          }
                          ?>
                          &nbsp;
                          <small class="ml-1 text-bold text-black"><?php echo $d['member_nama'] ?></small>
                        </a>
                      </td>
                      <td>
                        <div class="badge badge-info"><?php echo $d['posting_dibaca'] ?></div>
                      </td>
                      <td>
                        <div class="badge badge-warning">
                          <?php 
                          $id_posting = $d['posting_id'];
                          $komentar = mysqli_query($koneksi,"select * from diskusi where diskusi_posting='$id_posting'");
                          echo mysqli_num_rows($komentar);
                          ?>
                        </div>
                      </td>
                      <td>                      
                        <a class="btn btn-success btn-sm" href="diskusi_komentar.php?id=<?php echo $d['posting_id'] ?>"><i class="fa fa-comment"></i> Lihat Komentar</a>
                        <a class="btn btn-danger btn-sm" href="diskusi_hapus_konfir.php?id=<?php echo $d['posting_id'] ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

                    <?php 
                  }
                  ?>

                </tbody>
              </table>

            </div>

          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>