

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo $judul; ?></title>

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
      $id = $_SESSION['idinv'];
      include '../koneksi.php';
      $sql = "SELECT * FROM tb_admin WHERE id_admin = '$id'";
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

  <!-- Main Content -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Data Petugas</h1>
      </div>
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      <i class="fa fa-plus"></i> Tambah data
    </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah data petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?m=petugas&s=simpan" method="POST" enctype="multipart/form-data">
    
        <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
    <small id="emailHelp" class="form-text text-muted">Masukkan Username</small>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" placeholder="Masukkan Password">
    <small id="emailHelp" class="form-text text-muted">Masukkan Password</small>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Nama Petugas</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama Petugas">
    <small id="emailHelp" class="form-text text-muted">Masukkan Nama Petugas</small>
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Telepon Petugas</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="telepon" aria-describedby="emailHelp" placeholder="Masukkan Telepon Petugas">
    <small id="emailHelp" class="form-text text-muted">Masukkan Telepon Petugas</small>
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
      <div class="col-lg-12">
        <div class="table-responsive table--no-card m-b-30">
          <table class="table table-bordered table-striped table-custom">
            <thead>
                                            <tr>
                                                
                                 <th>Id Petugas</th>
                                 <th>Nama Petugas</th>
                                 <th>Telepon Petugas</th>
                                
                                
                                <th>Aksi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                           <?php 
                                          
                                            include 'paging.php';

                                            ?>
                                        </tbody>
                                    </table>
                                    

                                                                 <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?m=petugas&s=awal&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?m=petugas&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?m=petugas&s=awal&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center> 
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
            <p class="text-muted" style="font-size: 16px;">Copyright &copy; <script>document.write(new Date().getFullYear());</script> PIMS. All rights reserved</p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!--include-->
    <script src="../vendor/css/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $("form").on("submit", function(e){
        let isValid = true;
        $(this).find("input").each(function(){
          if ($(this).val().trim() === "") {
            isValid = false;
            alert("Field " + $(this).attr("name") + " cannot be empty or spaces only.");
            return false;
          }
        });
        if (!isValid) {
          e.preventDefault();
        }
      });
    });
  </script>

  </body>
</html>
