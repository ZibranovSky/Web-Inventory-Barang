<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn&SignUp</title>
    
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f0f0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-group {
      position: relative;
      width: 100%;
      margin-bottom: 20px;
    }

    .input-group {
      display: flex;
      align-items: center;
    }

    .input-group-addon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: #4d5bf9;
      color: #fff;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }

    .input-group-addon i {
      font-size: 18px;
    }

    .form-control {
      width: calc(100% - 40px);
      padding: 10px 15px;
      padding-left: 45px;
      border: 1px solid #ccc;
      border-left: none;
      border-top-right-radius: 20px;
      border-bottom-right-radius: 20px;
      background: #f9f9f9;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      outline: none;
      border-color: #4d5bf9;
      background: #fff;
    }

    .form-control::placeholder {
      color: #ccc;
    }
  </style>
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
       <!-- <form class="form" action="pro_login_petugas.php" method="post">
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                    <input class="form-control" type="text" name="user" required="" placeholder="Masukkan username Anda">
                  </div>
                 
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input class="form-control" type="password" name="pass" required="" value="" placeholder="Password">
                  </div>
                 
                  <div class="form-group">
                    <a href="../index.php">
                      <button type="button" name="button" class="btn btn-danger">Batal</button>
                    </a>

                    <input class="btn btn-success" type="submit" name="daftar" value="Masuk">
                  </div>
                 
                </form>
-->
          <form class="sign-in-form" action="pro_login_petugas.php" method="post" autocomplete="off">
            <h2 class="title">Login</h2>
            <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                    <input class="form-control" type="text" name="user" required="" placeholder="Masukkan username Anda" autocomplete="off">
                  </div>
           
                  <div class="form-group input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input class="form-control" type="password" name="pass" required="" value="" placeholder="Password" autocomplete="off">
                  </div>
            <input type="submit" value="Masuk" name="daftar" class="btn solid" />
            
           
          </form>


          <form action="tambah_petugas.php" class="sign-up-form" method="post">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" id="username" name="username" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="password" placeholder="Password" id="password" name="password" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="text" placeholder="Nama" id="nama" name="nama" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="number" placeholder="telepon" id="telepon" name="telepon" required/>
            </div>
            <input type="submit" value="Sign Up" class="btn solid" />

          
          </form>
        </div>
      </div>
      <div class="panels-container">

        <div class="panel left-panel">
            <div class="content">
                <h3>New here?</h3>
                <p>Belum punya akun?Daftar disini untuk memulai!</p>
                <button class="btn transparent" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="./img/log.svg" class="image" alt="">
        </div>

        <div class="panel right-panel">
            <div class="content">
                <h3>One of us?</h3>
                <p>Anda sudah memiliki akun?Login dengan klik disini!.</p>
                <button class="btn transparent" id="sign-in-btn">Login</button>
            </div>
            <img src="./img/register.svg" class="image" alt="">
        </div>
      </div>
    </div>

    <script src="./app.js"></script>
  </body>
</html>
