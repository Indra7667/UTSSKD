<?php

require "functions.php";

session_start();
if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>FIDEM EXPRESS</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
</head>
<?php
$id = $_GET['id'];
$query = "SELECT * from mahasiswa where id = '$id'";
$query_exec = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($query_exec)) :
?>

  <body>
  <?php
	function decRSA($E){
	$dat[0]=1;
	for ($o=0; $o<=11; $o++){
		$rest[$o]=$E%119;
		if($dat[$o]>119){
			$dat[$o+1]=$dat[$o]*$rest[$o]%119;
		} else {
		$dat[$o+1]=$dat[$o]*$rest[$o];
		}
	}
	$get=$dat[11]%119;
	return $get;
	}
	$dek=$row["nama"];
?>
	
    <nav class="navbar navbar-expand-lg navbar-success" style="background-color: #3399ff;">
      <div class="container-fluid">
<!--        <a class="navbar-brand" href="home.php?id=<?php echo $row['id'] ?>">
          <img src="image/logo_putih.png" alt="navbar-brand" width="150"></a>-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-3 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php?id=<?php echo $row['id'] ?>" style="color: white; font-size: 15px;"><b>Home</b></a>
            </li>
<!--            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="order.php?id=<?php echo $row['id'] ?>" style="color: white; font-size: 15px;"><b>Order</b></a>
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
          <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-2">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: white;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
              <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" style="background-color: #1cb688; color:white"><?php for ($p=0;$p<strlen($row['nama']);$p++){
						$m=ord($dek[$p]);
						$dec= $dec.chr(decRSA($m));
						} echo $dec; ?></a>
                </li>
                <!--<li><a class="dropdown-item mt-1" href="settings.php?id=<?php echo $row['id'] ?>">Settings</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>-->
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <?php endwhile; ?>
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


    <script src="./css/main.js"></script>
  </body>

</html>