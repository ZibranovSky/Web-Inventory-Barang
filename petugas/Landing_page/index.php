<?php 
  
  include '../koneksi.php';

if ( !isset($_SESSION["idinv2"])) {
  header("Location: login_petugas.php");
  exit();
}


 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Funel - Agancy landing page</title>

  <!-- 
    - favicon link
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header>

    <div class="container">


      <div class="navbar-wrapper">

        <button class="navbar-menu-btn" data-navbar-toggle-btn>
          <ion-icon name="menu-outline"></ion-icon>
        </button>

        <nav class="navbar" data-navbar>

          <ul class="navbar-list">

            <li class="nav-item">
              <a href="#home" class="nav-link">Home</a>
            </li>

            <li class="nav-item">
              <a href="#about" class="nav-link">What we do</a>
            </li>

            <li class="nav-item">
              <a href="#features" class="nav-link">Why us?</a>
            </li>
          </ul>
        
        </nav>

      </div>

    </div>

  </header>





  <main>

    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <div class="hero-content">

            <h1 class="h1 hero-title">Poltek Inventory Management System</h1>

            <p class="hero-text">
              Tak akan ada lagi yang berantakan!
              Di desain khusus untuk anda. Memiliki fitur fitur yang akan membantu anda dalam manajemen inventori!
            </p>
            <p class="hero-text">
             Mulai dengan klik dibawah ini
            </p>

            <div class="form-group">
                    <a href="../petugas/sign.php">
                    <button class="btn btn-primary">Get Started!</button>
                    </a>
</div>

          </div>

          <div class="hero-banner"></div>

        </div>

        <img src="./assets/images/bg.png" alt="shape" class="shape-content">
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="about" id="about">
        <div class="container">

          <div class="about-top">

            <h2 class="h2 section-title">What we do</h2>

            <p class="section-text">
              Kami Menyediakan website peminjaman barang, anda dapat mengajukan peminjaman barang.
              Anda juga bisa mengelola data barang yang masuk atau yang sudah anda pinjam.
            </p>

            <ul class="about-list">

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="briefcase-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">Fitur yang dipersonalisasi</h3>

                  <p class="card-text">
                   Anda bisa login sebagai admin dan sebagai user di satu tempat yang sama.

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="chatbubbles-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">Fitur User</h3>

                  <p class="card-text">
                   User bisa meminjam barang yang tersedia, memantau progress pengajuannya,
                   serta mengelola penyimpanannya.
                  </p>

                </div>
              </li>

              <li>
                <div class="about-card">

                  <div class="card-icon">
                    <ion-icon name="rocket-outline"></ion-icon>
                  </div>

                  <h3 class="h3 card-title">Fitur Admin</h3>

                  <p class="card-text">
                   Admin mempunyai data mulai dari user, supplier, barang keluar, data peminjam, serta 
                   hal - hal vital lain terkait inventory.
                  </p>

                </div>
              </li>

            </ul>

          </div>

          <div class="about-bottom">

            <figure class="about-bottom-banner">
              <img src="./assets/images/about-banner.png" alt="about banner" class="about-banner">
            </figure>

            <div class="about-bottom-content">

              <h2 class="h2 section-title">We’re Here To Help You!</h2>

              <p class="section-text">
               Kami tahu, bahwa tidak semua orang punya waktu untuk menyusun barangnya dengan baik,
               maka dari itu kami hadirmenyediakan layanan yang sangat mudah digunakan,
               sehingga anda tidak perlu khawatir lagi terkait masalah penyimpanan.
              </p>

              <p class="section-text">
              Anda admin dari web ini?silahkan login dibawah ini
              </p>
              <div class="form-group">
                    <a href="../admin/login.php">
                    <button class="btn btn-secondary">Login For Admin</button>
                    </a>
</div>
             
            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #FEATURES
      -->

      <section class="features" id="features">
        <div class="container">

          <h2 class="h2 section-title">Tak usah khawatir, tim kami berisi orang kompeten.</h2>

          <p class="section-text">
           Selain menawarkan manajemen inventory, kami juga menjamin keamanan barang anda.
          </p>

          <ul class="features-list">

            <li class="features-item">

              <figure class="features-item-banner">
                <img src="./assets/images/feature-1.png" alt="feature banner">
              </figure>

              <div class="feature-item-content">
                <h3 class="h2 item-title">Cover your Inventory</h3>

                <p class="item-text">
                 Tenang saja, Web ini akan menjamin Inventory anda aman, dan tertata dengan baik.
                </p>
              </div>

            </li>

            <li class="features-item">

              <figure class="features-item-banner">
                <img src="./assets/images/feature-2.png" alt="feature banner">
              </figure>

              <div class="feature-item-content">
                <h3 class="h2 item-title">We offer free management system</h3>

                <p class="item-text">
               Tenang saja, anda tidak akan dikenakan apapun dalam penggunaannya, 100% gratis, menggiurkan bukan?
                </p>
              </div>

            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      
        
    





      <!-- 
        - #CONTACT
      -->


        

     

    </article>

  </main>





  <!-- 
    - #FOOTER
  -->

  <footer>


        
    <div class="footer-bottom">
      <p class="copyright">
        &copy; 2023 <a>PIMS</a> All right reserved
      </p>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top active" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>