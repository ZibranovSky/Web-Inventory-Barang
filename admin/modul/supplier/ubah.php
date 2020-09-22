 
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Input Data Admin</title>

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
         	$id = $_GET['id_sup'];
           include '../koneksi.php';
           $sql = "SELECT * FROM tb_sup WHERE id_sup = '$id'";
           $query = mysqli_query($koneksi, $sql);
            $r = mysqli_fetch_array($query);

           ?>
          <ul class="nav navbar-top-links navbar-right">
            
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
                <a href="?m=petugas&s=awal">
                  <i class="fa fa-users"></i> Data Petugas
                </a>
              </li>
                            <li>
                <a href="?m=supplier&s=awal">
                  <i class="fa fa-building"></i> Data Supplier
                </a>
              </li>
                            <li>
                <a href="?m=rak&s=awal">
                  <i class="fa fa-cubes"></i> Data Rak
                </a>
              </li>
                            <li>
                <a href="?m=barang&s=awal">
                  <i class="fa fa-archive"></i> Data Barang
                </a>
              </li>

                            <li>
                <a href="?m=barangKeluar&s=awal">
                  <i class="fa fa-cart-arrow-down"></i> Data Barang Keluar
                </a>
              </li>
              <li>
                <a href="logout.php" onclick="return confirm('yakin ingin logout?')">
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
            <h1 class="page-header">Data Supplier</h1>
          </div>
        </div>

    <div class="row">

    	<form action="?m=supplier&s=update" method="POST" enctype="multipart/form-data">
    	<div class="form-group">
    
    <input type="hidden" name="id_sup" value="<?php echo$r['id_sup'];?>" >
   
  </div>
        <div class="form-group">
    <label for="exampleInputEmail1">Nama Supplier</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama_sup" value="<?php echo $r['nama_sup']; ?>" aria-describedby="emailHelp" placeholder="Masukkan Nama">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nama</small>
  </div>
  <div class="form-group">
    <label>Kontak Supplier</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="kontak_sup" aria-describedby="emailHelp" placeholder="Masukkan Kontak" value="<?php echo $r['kontak_sup']; ?>">
    <small class="form-text text-muted">Kontak Supplier</small>
  </div>
  <div class="form-group">
    <label>Alamat Supplier</label>
   <input type="text"  class="form-control" aria-describedby="emailHelp" value="<?php echo $r['alamat_sup']; ?>" name="alamat_sup" placeholder="Masukkan Alamat">
    <small id="emailHelp" class="form-text text-muted">Masukkan Alamat</small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Telepon Supplier</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $r['telepon_sup']; ?>" name="telepon_sup" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nomor Telepon</small>
  </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    	
    </div>

        


    <!-- Footer -->
    <footer class="text-center">
      <div class="footer-below">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
            <p class="text-muted" style="font-size: 16px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> Muhamad Zibran Fitadiyatama All rights reserved</p>
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
