<?php

require "functions.php";

session_start();

if (isset($_POST["login"])) {

	$newuser = $_POST['username'];
	$newpass = $_POST['password'];
	/*RSA*/
	$hashpa = hash('md5', $newpass); /*HASH*/
	/*Caesar*/
	$key = "2"; 
	for ($v = 0; $v < strlen($newuser); $v++) {
	$kode[$v] = ord($newuser[$v]); 
	$f[$v] = ($kode[$v] + $key) % 256; 
	$g[$v] = chr($f[$v]);}
	$user = '';
	for ($u = 0; $u < strlen($newuser); $u++) {
		$user = $user . $g[$u];
	}

  $result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE username = '$user' or email = '$user'");
  /*$result2 = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' or email = '$username'");
  $result3 = mysqli_query($conn, "SELECT * FROM tb_kurir WHERE username = '$username' or email = '$username'");*/
  if (mysqli_num_rows($result) == 1) {
    
    $rows = mysqli_fetch_assoc($result);
    if ($hashpa == $rows["password"]) {

      $_SESSION["login"] = true;
      header("Location: home.php?id=$rows[id]");
    }
    else{
		/*?><body> <?php echo $user."<br>"; echo $hashpa."<br>"; echo $rows["password"]?></body><?php*/
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  }
  /*else if (mysqli_num_rows($result2) == 1) {
    
    $rows = mysqli_fetch_assoc($result2);

    if (password_verify($password, $rows["password"])) {

      $_SESSION["login"] = true;
      header("Location: admin/index.php?id=$rows[id]");
    }
    else{
   
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  }
  else if (mysqli_num_rows($result3) == 1) {
    
    $rows = mysqli_fetch_assoc($result3);

    if (password_verify($password, $rows["password"])) {

      $_SESSION["login"] = true;
      header("Location: kurir/index.php?id=$rows[id]&asal_kurir=$rows[asal_kurir]");
    }
    else{
   
      // alihkan ke halaman login kembali
      header("location:index.php?pesan=gagal");
    }	
  }*/
}
?>

<!-- <!doctype html>
<html lang="en">

<head>
  <title>Login</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
  <link rel="stylesheet" type="text/css" href="css/style.css">



  <link href="css/login.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <link href="css/login.css" rel="stylesheet">
</head>

<body class="text-center">

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
      <div class="form" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">  
        <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
        <a href="index.php" role="button" class="w-100 btn btn-lg btn-warning" style="color: white;" type="submit">Cancel</a>
      </div>
        Don't have an account? <a href="registration.php" style="text-decoration: none;" class="link-danger">Register Now</a>
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>



</body>

</html> -->