<?php 
$row="202cb962ac59075b964b07152d234b70";
$password="123";
$hashpa=hash('md5', $password);
echo $hashpa."<br>";
echo $row."<br>";
    if ($hashpa == $row){
		echo "1";
	} else {
		echo "2";
	}
?><br>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "v3420040_skd";

$conn = new mysqli($hostname, $username, $password, $database);
global $conn;
function encRSA($M){ /*RSA*/
	$dt[0]=1; //inisiasi dt[$i]=1
	for ($h=0; $h<=35; $h++){ //looping sejumlah kunci e=35
		$rest[$h]=$M%119; //inisiasi plainteks ($M)
		if($dt[$h]>119){ /*jika dt lebih dari n=119 maka
			kembalikan ke awal lagi (%119) */
			$dt[$h+1]=$dt[$h]*$rest[$h]%119;
			/*data baru merupakan perkalian data lama dengan
			plainteks sejumlah e=35 */
		} else {
			$dt[$h+1]=$dt[$h]*$rest[$h];
		}
	}
		$get=$dt[35]%119;
		return $get;
}

	$nama = "1234";
	$email="123@gmail.com";
	$key = "1"; //key for caesar
				
	$R_name= strtolower( $nama);
	$C_mail= mysqli_escape_string($conn, $email);
for ($l=0;$l<strlen($R_name);$l++){
	$m=ord($R_name[$l]); //merubah karakter menjadi ASCII	
		/*-----RSA ENCRYPTION-----*/
//$enc="";
$enc= $enc.chr(encRSA($m));}
		/*-----CAESAR ENCRYPTION-----*/
for ($a = 0; $a < strlen($C_mail); $a++) {
	$kode[$a] = ord($C_mail[$a]); 
	$b[$a] = ($kode[$a] + $key) % 256; 
	$c[$a] = chr($b[$a]);
	}
$caesar="";
	for ($z = 0; $z < strlen($C_mail); $z++) {
		$caesar = $caesar . $c[$z];
	}
	
	echo $caesar."<br>";
	echo $enc."<br>";
	echo mysqli_escape_string($conn,$caesar)."<br><hr>";

	$newuser = "1234";
	$newpass = "1234";
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
	$user = $user . $g[$u];}
	echo $user."<br>";
	echo $hashpa;
?>


