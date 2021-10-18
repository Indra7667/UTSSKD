<?php
include "login.php";
include "registration.php";

if (isset($_GET['pesan'])) {
  if ($_GET['pesan'] == "gagal") {
    echo "<script>
      alert('Wrong username or password');
      window.location.replace('index.php');
      </script>";
  }
}


?>

<!DOCTYPE html>
<html>

<head>
  <title>V3420040_UTS</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link href="css/login.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-success" style="background-color: #3399ff;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="image/logo_putih.png" alt="navbar-brand" width="150"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-3 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php" style="color: white; font-size: 15px;"><b>Home</b></a>
          </li>
<!--          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#login" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal" style="color: white; font-size: 15px;"><b>Order</b></a>
          </li>-->
          <li class="nav-item dropdown">
            <a role="button" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size: 15px;">
              <b>Information</b>
            </a>
            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton2">
              <li><a class="dropdown-item" href="#">Something</a></li>
              <li><a class="dropdown-item" href="#">Something</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a role="button" class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; font-size: 15px;">
              <b>About Us</b>
            </a>
            <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton3">
              <li><a class="dropdown-item" href="#">Something</a></li>
              <li><a class="dropdown-item" href="#">Something</a></li>

            </ul>
          </li>
        </ul>
<!--        <div id='form-input'>
          <form action="cekresinolog.php" method="get" class="d-flex justify-content-center">
            <input name="cari" id="cari" class="form-control me-2" type="search" placeholder="Cek Resi" aria-label="Search" required>
            <input value="Search" type="submit" role="button" class="btn btn-outline-dark border border-2 me-md-4" style="color :black; background-color: #fff;">
          </form>
        </div>-->
        <!-- <a href="login.php" class="btn btn-primary">Login/Registrasi</a> -->
        <!-- Button trigger modal -->
        <button style="position: relative; right:5px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">
          Login/Registrasi
        </button>
      </div>
    </div>
  </nav>

  <!-- Modal -->
  <!-- <div class="text-center">
  <div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <main class="form-signin">
    <form action="" method="POST">
      <img class="mb-4" src="image/logo_asli.png" alt="navbar-brand" width="300">
      <h1 class="h3 mb-3 fw-normal">Login</h1>

      <div class="form-floating">
        <input type="text" class="form-control" name="username" id="username" placeholder="username" required autofocus>
        <label for="username">Username or Email</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
        <label for="password">Password</label>
      </div>

      <?php if (isset($error)) : ?>
        <p style="color:red;" class="fst-italic">Wrong username or password</p>
      <?php endif ?>

      <div class="checkbox mt-2 mb-2">
        <label for="setcookie">
          <input type="checkbox" name="setcookie" value="true" id="setcookie"> Remember me
        </label>
      </div>
      <div class="form" align="center">  
        <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
      </div>
        Don't have an account? <a href="registration.php" style="text-decoration: none;" class="link-danger">Register Now</a>
    </form>
  </main>
      </div>
    </div>
  </div>
  </div>
  </div> -->
  <div class="text-center">
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <main class="form-signin">
              <form action="" method="POST">
                <!--<img class="mb-4" src="image/logo_asli.png" alt="navbar-brand" width="300">-->
                <h1 class="h3 mb-3 fw-normal">Login</h1>

                <div class="form-floating">
                  <input type="text" class="form-control" name="username" id="username" placeholder="username" required autofocus>
                  <label for="username">Username or Email</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" name="password" id="password" placeholder="Password" required>
                  <label for="password">Password</label>
                </div>

                <?php if (isset($error)) : ?>
                  <p style="color:red;" class="fst-italic">Invalid Input</p>
                <?php endif ?>

                <div class="checkbox mt-2 mb-2">
                  <label for="setcookie">
                    <input type="checkbox" name="setcookie" value="true" id="setcookie"> Remember me
                  </label>
                </div>
                <div class="form" align="center">
                  <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
                </div>
                Don't have an account? <a href="#register" data-bs-target="#register" data-bs-toggle="modal" data-bs-dismiss="modal" style="text-decoration: none;" class="link-danger">Register Now</a>
              </form>
            </main>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="register" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <main class="form-signin">
              <form action="" method="post">
                <!--<img class="mb-4" src="image/logo_asli.png" alt="navbar-brand" width="300">-->
                <h1 class="h3 mb-3 fw-normal">Registration</h1>

                <div class="form-floating">
                  <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" required autofocus>
                  <label for="floatingInput">Nama Lengkap</label>
                </div>
                <div class="form-floating">
                  <input type="text" name="username" class="form-control" id="username" placeholder="username" required autofocus>
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                  <input type="email" name="email" class="form-control" id="email" placeholder="email" required>
                  <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                  <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" name="password2" class="form-control" id="password2" placeholder="password" required>
                  <label for="floatingPassword">Repeat Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" name="registrasi" type="submit">Register</button>
                Already have an account? <a href="#login" data-bs-target="#login" data-bs-toggle="modal" data-bs-dismiss="modal" style="text-decoration: none;" class="link-primary">Login!</a>
              </form>
            </main>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="wrap">
    <div class="container-1" style="height: 100%;overflow-x: hidden;">
      <div class="p-3 mb-1 bg-white text-success" style="text-align: center;"><b style="font-size:xx-large; ">WEB NAME<b></div>
    </div>
    <div class="container-2">
      <div class="box d-flex justify-content-center bg-success" style="height: 300px;">
        <div class="isi" style="position: relative; top: 60px; display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; grid-gap: 50px; padding-left: 20px;">
          <img src="image/logo.png" class="image" style="height: 180px" alt="" width="70%">
          <p>Type something important here</p>
        </div>
      </div>
    </div>
    <div class="box" style="height: 50px;">
    </div>
    <footer class="footer d-flex justify-content-center" style="background-color: #6699ff ; height: 50px;">
      <div class="isi">
        <p class="foot_remark" style="color: white; font-size: small;  position: relative; top: 15px; font-family: Times New Roman; ">Insert something important here</p>
      </div>
    </footer>

    <script src="./css/main.js">
      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', function() {
        myInput.focus()
      })
    </script>
</body>

</html>