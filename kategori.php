<?php include 'header.php'; ?>

<div class="container-fluid">

  <div class="row">
  <?php include 'sidebar.php'; ?>
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">

          <?php 
          $id = $_GET['id'];
          $kategori = mysqli_query($koneksi,"select * from kategori where kategori_id='$id'");
          $k = mysqli_fetch_assoc($kategori);
          ?>
          <div class="btn-group pull-right mb-3">
            <div class="dropdown">
              Urutkan : &nbsp;
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if(isset($_GET['urutan']) && $_GET['urutan'] == "terpopuler"){echo "Terpopuler";}else{echo "Terbaru";} ?>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="?urutan=terbaru&id=<?php echo $k['kategori_id'] ?>">Terbaru</a>
                <a class="dropdown-item" href="?urutan=terpopuler&id=<?php echo $k['kategori_id'] ?>">Terpopuler</a>
              </div>
            </div>
          </div>


          <?php 
          if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "Diskusi yang dicari : <b>'".$cari." '</b>";
          }
          ?>

          <?php 
          if(isset($_GET['urutan'])){
            $urutan = $_GET['urutan'];
            echo "Diurutkan : <b>'".$urutan." '</b>";
          }
          ?>

          <?php
          echo "Kategori : <b>".$k['kategori_nama']."</b>";
          ?>

          <table class="table table-">
            <thead>
              <tr>
                <th class="col-lg-8">Judul Diskusi</th>
                <th>Kategori</th>
                <th>Member</th>
                <th><i class="fa fa-eye"></i></th>
                <th><i class="fa fa-comment"></i></th>
              </tr>
            </thead>
            <tbody>

              <?php
              $halaman = 10;
              $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
              $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
              $result = mysqli_query($koneksi, "SELECT * FROM posting");
              $total = mysqli_num_rows($result);
              $pages = ceil($total/$halaman);  
              $kat = $_GET['id'];
              if(isset($_GET['urutan']) && $_GET['urutan'] == "terpopuler"){
                if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  $data = mysqli_query($koneksi,"select * from posting,kategori,member where posting_member=member_id and kategori_id=posting_kategori and kategori_id='$kat' and posting_judul like '%$cari%' order by posting_dibaca DESC LIMIT $mulai, $halaman");
                }else{
                  $data = mysqli_query($koneksi,"select * from posting,kategori,member where posting_member=member_id and kategori_id='$kat' and kategori_id=posting_kategori order by posting_dibaca DESC LIMIT $mulai, $halaman");
                }
              }else{

                if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  $data = mysqli_query($koneksi,"select * from posting,kategori,member where posting_member=member_id and kategori_id='$kat' and kategori_id=posting_kategori and posting_judul like '%$cari%' order by posting_id desc LIMIT $mulai, $halaman");
                }else{
                  $data = mysqli_query($koneksi,"select * from posting,kategori,member where posting_member=member_id and kategori_id='$kat' and kategori_id=posting_kategori order by posting_id desc LIMIT $mulai, $halaman");
                }

              }          
              $no =$mulai+1;

              while($d = mysqli_fetch_array($data)){
                ?>


                <tr>
                  <td>
                    <a href="diskusi.php?id=<?php echo $d['posting_id']; ?>"><?php echo $d['posting_judul'] ?></a>
                    <br/><i><small><?php echo date('d-M-Y H:i:s',strtotime($d['posting_tanggal'])) ?></small></i>
                  </td>
                  <td>
                    <a href="kategori.php?id=<?php echo $d['kategori_id']; ?>">
                      <div class="badge badge-warning"><?php echo $d['kategori_nama'] ?></div>
                    </a>
                  </td>
                  <td>
                    <a href="detail_member.php?id=<?php echo $d['member_id']; ?>">
                      <?php 
                      if($d['member_foto'] == ""){
                        ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="gambar/sistem/member.png">
                        <?php
                      }else{
                        ?>
                        <img class="img-fluid rounded-circle shadow" style="width: 40px;height: 40px" src="gambar/member/<?php echo $d['member_foto'] ?>">
                        <?php
                      }
                      ?>
                      <small class="ml-1"><?php echo $d['member_nama'] ?></small>
                    </a>
                  </td>
                  <td>
                    <div class="badge badge-info"><?php echo $d['posting_dibaca'] ?></div>
                  </td>
                  <td>
                  <div class="badge badge-info">
                    <?php 
                    $id_posting = $d['posting_id'];
                    $jumlah_diskusi = mysqli_query($koneksi,"select * from diskusi where diskusi_posting='$id_posting'");
                    echo mysqli_num_rows($jumlah_diskusi);
                    ?>
                  </div>
                </td>
                </tr>

                <?php 
              }
              ?>

            </tbody>
          </table>

          <hr/>

          <nav aria-label="...">
            <ul class="pagination justify-content-center">


              <?php for ($i=1; $i<=$pages ; $i++){ ?>
                <?php if($page==$i){ ?>
                  <li class="page-item active">
                    <a class="page-link" href="#"><?php echo $i; ?> <span class="sr-only">(current)</span></a>
                  </li>
                <?php }else{ ?>

                  <?php 
                  if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $c = "&cari=".$cari;
                  }else{
                    $c = "";
                  }
                  if(isset($_GET['urutan']) && $_GET['urutan'] == "terpopuler"){
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>&urutan=terpopuler<?php echo $c ?>"><?php echo $i; ?></a></li>
                    <?php 
                  }else{
                    ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                  }
                  ?>

                <?php } ?>
              <?php } ?>
            </ul>
          </nav>




        </div>
      </div>

    </div>

    

  </div>
</div>

<?php include 'footer.php'; ?>
