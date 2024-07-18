<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Edit Data Barang</title>

  <!-- Bootstrap -->
  <link href="../vendor/css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../vendor/css/bootstrap/bootstrap.css" rel="stylesheet">

  <!-- Icon and Fonts -->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- Custom CSS -->
  <link href="../css/tampilanadmin.css" rel="stylesheet">

  <style>
    .navbar-custom {
      background-color: #2c3e50;
      color: white;
    }
    .navbar-custom .navbar-brand, .navbar-custom .navbar-nav > li > a {
      color: white;
    }
    .navbar-custom .navbar-brand {
      font-weight: bold;
      font-size: 30px; /* Increase font size */
    }
    .navbar-custom .navbar-nav > li > a:hover {
      background-color: #1abc9c;
      color: white;
    }
    .navbar-horizontal {
      display: flex;
      justify-content: space-around;
      background-color: #ecf0f1;
      padding: 10px 0;
      margin-bottom: 20px;
    }
    .navbar-horizontal a {
      color: #2c3e50;
      padding: 10px 15px;
      text-decoration: none;
    }
    .navbar-horizontal a:hover {
      background-color: #1abc9c;
      color: white;
    }
    .container-fluid {
      padding: 20px;
    }
    .page-header {
      text-align: center;
      margin-top: -20px; /* Move text higher */
      margin-bottom: 30px;
    }
    .table-earning th, .table-earning td {
      text-align: center;
    }
    .btn-primary {
      background-color: #2c3e50;
      border-color: #2c3e50;
    }
    .btn-primary:hover {
      background-color: #1abc9c;
      border-color: #1abc9c;
    }
    .navbar-header {
      display: flex;
      justify-content: center;
      width: 100%;
    }
    /* Custom table styles */
    .table-custom {
      margin: 20px 0;
      box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      overflow: hidden;
    }
    .table-custom thead th {
      background-color: #2c3e50;
      color: white;
    }
    .table-custom tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    .table-custom tbody tr:hover {
      background-color: #1abc9c;
      color: white;
    }
    .table-custom tbody td, .table-custom thead th {
      padding: 15px;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <!-- Menu -->
  <nav class="navbar navbar-custom navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="#">Poltek Inventory Management System</a>
    </div>
    <?php 
      $id = $_GET['kode_brg'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_barang WHERE kode_brg = '$id'";
      $query = mysqli_query($koneksi, $sql);
      $r = mysqli_fetch_array($query);
    ?>
  </nav>

  <!-- Horizontal Menu -->
  <div class="navbar-horizontal">
    <a href="?m=awal.php"><i class="fa fa-dashboard"></i> Beranda</a>
    <a href="?m=admin&s=awal"><i class="fa fa-user"></i> Data Admin</a>
    <a href="?m=petugas&s=awal"><i class="fa fa-users"></i> Data Petugas</a>
    <a href="?m=supplier&s=awal"><i class="fa fa-building"></i> Data Supplier</a>
    <a href="?m=rak&s=awal"><i class="fa fa-cubes"></i> Data Rak</a>
    <a href="?m=barang&s=awal"><i class="fa fa-archive"></i> Data Barang</a>
    <a href="?m=barangKeluar&s=awal"><i class="fa fa-cart-arrow-down"></i> Data Barang Keluar</a>
    <a href="logout.php" onclick="return confirm('Yakin ingin logout?')"><i class="fa fa-warning"></i> Logout</a>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Edit Data Barang</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <form action="?m=barang&s=update" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Kode Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="kode_brg" value="<?php echo $r['kode_brg']; ?>" placeholder="Masukkan Kode Barang">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Nama Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="nama_brg" value="<?php echo $r['nama_brg']; ?>" placeholder="Masukkan Nama Barang">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Stok Barang</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="stok" value="<?php echo $r['stok']; ?>" placeholder="Masukkan Stok Barang">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Rak</label>
            <select class="form-control" name="rak" required="">
              <?php 
                include '../koneksi.php';
                $sql = "SELECT * FROM tb_rak";
                $hasil = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_array($hasil)) {
              ?>  
              <option value="<?php echo $data['nama_rak'];?>" <?php if($data['nama_rak'] == $r['rak']) echo 'selected'; ?>><?php echo $data['nama_rak']; ?></option>
              <?php } ?>                                                  
            </select>
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
              <option value="<?php echo $data['nama_sup'];?>" <?php if($data['nama_sup'] == $r['supplier']) echo 'selected'; ?>><?php echo $data['nama_sup']; ?></option>
              <?php } ?>
            </select>
          </div>

          <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="text-center">
    <div class="footer-below">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p class="text-muted" style="font-size: 16px;">Copyright &copy;<script>document.write(new Date().getFullYear());</script> PIMS. All rights reserved</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="../vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap JavaScript -->
  <script src="../vendor/css/js/bootstrap.min.js"></script>
</body>
</html>
