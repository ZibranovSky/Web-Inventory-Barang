<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
           
        }

        
        .navbar-default.sidebar-horizontal {
            background: linear-gradient(to right, #00BFFF, #1E90FF);
            padding: 10px 0;
            margin-top: -1px; /* Slightly overlap the logo container */
            position: relative;
            z-index: 1; /* Ensure the sidebar is below the logo */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-default .navbar-collapse {
            display: flex;
            justify-content: center;
        }

        .navbar-default .nav {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .navbar-default .nav li {
            margin: 0 15px;
            transition: all 0.3s ease;
        }

        .navbar-default .nav li a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
            padding: 5px 10px;
            transition: all 0.3s ease;
        }

        .navbar-default .nav li a i {
            margin-right: 8px;
        }

        .navbar-default .nav li a:hover {
            color: #ffeb3b;
            transform: scale(1.1);
            background: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="logo-container">
      
        <h1 class="logo">POLTEK INVENTORY MANAGEMENT SYSTEM</h1>
    </div>
    <?php 
        $id = $_SESSION['idinv2'];
        include '../koneksi.php';
        $sql = "SELECT * FROM tb_petugas WHERE id_petugas = '$id'";
        $query = mysqli_query($koneksi, $sql);
        $r = mysqli_fetch_array($query);
    ?>
    <div class="navbar-default sidebar-horizontal" role="navigation">
        <div class="navbar-collapse">
            <ul class="nav">
                <li>
                    <a href="?m=awal.php">
                        <i class="fa fa-home"></i> Beranda
                    </a>
                </li>
                <li>
                    <a href="?m=barangMasuk&s=awal">
                        <i class="fa fa-box"></i> Data Barang Masuk
                    </a>
                </li>
                <li>
                    <a href="?m=ajuan&s=awal">
                        <i class="fa fa-paper-plane"></i> Data Ajuan
                    </a>
                </li>
                <li>
                    <a href="logout.php" onclick="return confirm('yakin ingin logout?');">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
</html>
