<?php


if (isset ($_POST["registrasi"])){

    if (registrasi($_POST)>0){
        echo "
            <script>
                alert('Registrasi Berhasil');
                window.location.replace('index.php');
            </script>
        ";

    } else {
        echo mysqli_error($conn);
    }
}
?>

<!-- <html>

<head>
    <title>Registasi</title>

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


    <link href="css/registration.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="" method="post">
            <img class="mb-4" src="image/logo_asli.png" alt="navbar-brand" width="300">
            <h1 class="h3 mb- fw-normal">Registration</h1>

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
            Already have an account? <a href="index.php" style="text-decoration: none;" class="link-primary">Login!</a>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
</body>

</html> -->