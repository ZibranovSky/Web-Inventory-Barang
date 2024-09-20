<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="style.css" rel="stylesheet">
  <style>
    body {
      background-color: #f5f5f5;
    }
    .login-container {
      max-width: 400px;
      margin: auto;
      margin-top: 100px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .login-header {
      text-align: center;
      margin-bottom: 20px;
    }
    .login-header h3 {
      color: #333333;
      font-weight: bold;
    }
    .login-form {
      padding: 20px 0;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      font-weight: bold;
    }
    .form-group input[type="text"],
    .form-group input[type="password"] {
      border: 1px solid #ced4da;
      border-radius: 5px;
      padding: 10px;
      width: 100%;
      transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .form-group input[type="text"]:focus,
    .form-group input[type="password"]:focus {
      border-color: #007bff;
      outline: 0;
      box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-login {
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn-login:hover {
      background-color: #0056b3;
    }
    .btn-cancel {
      background-color: #dc3545;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    .btn-cancel:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>

<!-- Main Content -->
<section class="container">
  <div class="login-container">
    <div class="login-header">
      <h3>Login Admin Inventory</h3>
    </div>
    <div class="login-form">
      <form action="pro_login_admin.php" method="post" class="form">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="user" required placeholder="Masukkan username Anda">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="pass" required placeholder="Password">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-login btn-block"><i class="fa fa-sign-in-alt"></i> Masuk</button>
        </div>
        <div class="text-center">
          <a href="../Landing_page/index.php" class="btn btn-cancel"><i class="fa fa-times"></i> Batal</a>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Xpo1GTPwq14uHtFQ6NvZfN+hFckVTtkI0H" crossorigin="anonymous"></script>

</body>
</html>
