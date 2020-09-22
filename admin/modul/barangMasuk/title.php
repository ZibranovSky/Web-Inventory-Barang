 <?php 

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");
  $jamSekarang = date("h:i a");
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Input Data Rak</title>

    <!-- boootstrap -->
    <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">

     <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- icon dan fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- tema css -->
    <link href="../css/tampilanadmin.css" rel="stylesheet">

  </head>
  <body>
    <!-- Menu -->
    <div id="wrapper">

      <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand">Inventory</a>
          </div>
          <?php 
          $id = $_SESSION['idinv'];
           include '../koneksi.php';
           $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
           $query = mysqli_query($koneksi, $sql);
            $r = mysqli_fetch_array($query);

           ?>
            <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
               <img src="../images/admin/<?php echo $r['foto']; ?>" height="50"></i> <?php echo $r['nama']; ?>
              </a>
              <ul class="dropdown-menu dropdown-user">
                <li>
                  <form class="" action="keluar_admin.php" method="post">
                    <button class="btn btn-default" type="submit" name="keluar"><i class="fa fa-sign-out"></i> Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>

        <!-- menu samping -->
        <div class="navbar-default sidebar" role="navigation">
          <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
              <li>
                <a href="?m=awal.php">
                  <i class="fa fa-dashboard"></i> Beranda
                </a>
              </li>
              <li>
                <a href="?m=admin&s=awal">
                  <i class="fa fa-user"></i> Data Admin
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-building"></i> Data Supplier
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-cubes"></i> Data Rak
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-shopping-cart"></i> Data Barang
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-cart-plus"></i> Data Barang Masuk
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-gift"></i> Data Ajuan
                </a>
              </li>
                            <li>
                <a href="data_karyawan.php">
                  <i class="fa fa-cart-arrow-down"></i> Data Barang Keluar
                </a>
              </li>
              <li>
                <a href="logout.php">
                  <i class="fa fa-warning"></i> Logout
                </a>
              </li>
              
            </ul>
          </div>
        </div>

      </nav>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Data Barang Masuk</h1>
          </div>
        </div>

        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Tambah data
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah barang masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?m=barangMasuk&s=simpan" method="POST" enctype="multipart/form-data">
        <div class="form-group">
    <label for="exampleInputEmail1">Tanggal</label>
    <input type="text" class="form-control" value="<?php echo $tanggalSekarang; ?>" id="exampleInputEmail1" name="tanggal" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
    <small id="emailHelp" class="form-text text-muted">Masukkan Tanggal</small>
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">No. Invoice</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="noinv" aria-describedby="emailHelp" placeholder="Masukkan Nomor Invoice">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nomor Invoice</small>
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Supplier</label>
    <select class="form-control" name="supplier" required="">
   <?php 

    include '../koneksi.php';

    $sql = "SELECT * FROM tb_sup";

    $hasil = mysqli_query($koneksi, $sql);

                                                

    while ($data = mysqli_fetch_array($hasil)) {
                                                    
                                                
                                                

      ?>
   
      <option value="<?php echo $data['nama_sup'];?>"><?php echo $data['nama_sup']; ?></option>
      <?php } ?>
                                                   
      </select>
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Kode Barang</label>
    
    <?php 
            include ("../koneksi.php");
            $supp = ("SELECT * FROM tb_barang");
            $result = mysqli_query($koneksi, $supp);

            $jsArray = "var prdName = new Array();";

            echo '<select name="kode_brg" onchange="changeValue(this.value)">';
            echo '<option>--- PILIH ---</option>';

            while ($row = mysqli_fetch_array($result)) {
              echo '<option value="'. $row['kode_brg'] .'">KDB'.$row['kode_brg'].'</option>';
              $jsArray .= "prdName['". $row['kode_brg'] ."'] 
              = {nama_brg:'". addslashes($row['nama_brg']) ."',
                stok:'". addslashes($row['stok']) ."', supplier:'". addslashes($row['supplier']) ."'
              };";
            }


            echo '</select>';
          ?>
          <script type="text/javascript">
            <?php echo $jsArray; ?>
            function changeValue(id){
              
              document.getElementById('prd_nmbrg').value = prdName[id].nama_brg;
              document.getElementById('prd_stk').value = prdName[id].stok;
               document.getElementById('prd_sup').value = prdName[id].supplier;
            }
          </script>
          
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Nama Barang</label>
    <input type="text" name="nama_brg" readonly="" id="prd_nmbrg" size="67">

  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Stok</label>
    <input type="text" class="form-control" id="prd_stk" name="stok" aria-describedby="emailHelp" placeholder="Masukkan Stok Barang">

  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Jumlah Masuk</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="jml_masuk" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Masuk">
    <small id="emailHelp" class="form-text text-muted">Masukkan Jumlah Masuk</small>
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Jam</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $jamSekarang; ?>" name="jam" aria-describedby="emailHelp" placeholder="Masukkan Jam">
    <small id="emailHelp" class="form-text text-muted">Masukkan Jam</small>
  </div>
          <div class="form-group">
    <label for="exampleInputEmail1">Admin</label>
    <input type="text" class="form-control" id="exampleInputEmail1" readonly="" name="petugas" aria-describedby="emailHelp" placeholder="Masukkan Nama Admin">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nama Admin</small>
  </div>
         
  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>

         <div class="row">

                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                
                                 <th>Id Barang Masuk</th>
                                 <th>Tanggal</th>
                                 <th>No Invoice</th>
                                 <th>Supplier</th>
                                 <th>Kode Barang</th>
                                 <th>Nama Barang</th>
                                 <th>Stok</th>
                                 <th>Jumlah Masuk</th>
                                 <th>Jam</th>
                                 <th>Petugas</th>

                                
                                
                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           <?php 
                                          
                                            include 'paging.php';

                                            ?>
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>


      </div>
    </div>


    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
            <p class="text-muted" style="font-size: 16px;">Copyright &copy; <script>document.write(new Date().getFullYear());</script> Muhamad Zibran Fitadiyatama. All rights reserved</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="../vendor/css/js/bootstrap.min.js"></script>

  </body>
</html>
