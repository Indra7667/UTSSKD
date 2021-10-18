<!DOCTYPE html>
<html>
<head>
	 <title>enkripsi</title>
	 <link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>

	<!--Vigenere-->
	<?php
	include "lib/lib.php";
	$kunci = "I";
	$plain = str_replace(" ", "", $_POST['plain']);
	$panjang_plain = strlen($plain);
	$panjang_kunci = strlen($kunci);
	$index_x = 0;
	$index_y = 0;
	$hasil_ciper = array();
	$vigenere = "";
	
	while ($index_x < $panjang_plain) {
		$x = substr($plain, $index_x, 1);
		$y = substr($kunci, $index_y, 1);
		$hasil_ciper[$index_x] = 
		$tabel_vigenere[huruf_ke_angka($x)][huruf_ke_angka($y)];
		$index_x++;
		$index_y++;
		if ($index_y == $panjang_kunci) {
			$index_y = 0;
		}
	}
	$i = 0;
	while ($i < $index_x) {
		$vigenere .= $hasil_ciper[$i];
		$i++;
	}
	?>
		<!--Caesar-->
	<?php
		$kalimat = $_POST["plain"];
		$key = "1";
		for ($k = 0; $k < strlen($kalimat); $k++) {
			$kode[$k] = ord($kalimat[$k]); 
			$b[$k] = ($kode[$k] + $key) % 256; 
			$c[$k] = chr($b[$k]); 
		}
/*		echo "kalimat ASLI : ";
		for ($i = 0; $i < strlen($kalimat); $i++) {
			echo $kalimat[$i];
		}
		echo "<br>";
		echo "hasil enkripsi =";
		$hsl = '';
		for ($i = 0; $i < strlen($kalimat); $i++) {
			echo $c[$i];
			$hsl = $hsl . $c[$i];
		}
		echo "<br>";
		$fp = fopen("enkripsi.txt", "w");
		fputs($fp, $hsl);
		fclose($fp);*/
		
	?>

		<!--RSA-->
	<?php 
		error_reporting(0);
		function encRSA($M){
			$data[0]=1; //inisiasi data[$i]=1
			for ($h=0; $h<=35; $h++){ //looping sejumlah kunci e=35
				$rest[$h]=$M%119; //inisiasi plainteks ($M)
				if($data[$h]>119){ /*jika data lebih dari n=119 maka
					kembalikan ke awal lagi (%119) */
					$data[$h+1]=$data[$h]*$rest[$h]%119;
					/*data baru merupakan perkalian data lama dengan
					plainteks sejumlah e=35 */
				} else {
					$data[$h+1]=$data[$h]*$rest[$h];
				}
			}
				$get=$data[35]%119;
				return $get;
		}

		$kalimat= $_POST["plain"];
		//encrypt
/*		echo "Plainteks = $kalimat ";
		echo "<br>";*/
		for ($l=0;$l<strlen($kalimat);$l++){
			$m=ord($kalimat[$l]); //merubah karakter menjadi ASCII
			$enc= $enc.chr(encRSA($m));
		}
		
		//decrypt
/*		for ($i=0;$i<strlen($kalimat);$i++){
		$m=ord($enc[$i]);
		$dec= $dec.chr(decRSA($m));
		}
		echo "Hasil Dekripsi = $dec";*/
	?>
	
	<!--gabungan-->
	<?php 
	
	/*	for ($j = 0; $j < strlen($vigenere); $j++) {
			$kode[$j] = ord($vigenere[$j]); 
			$d[$j] = ($kode[$j] + $key) % 256; 
			$f[$j] = chr($d[$j]);}
		//function caesar() { for ($j = 0; $j < strlen($vigenere); $j++){ return $f[$j];}}
		echo $f[$j];
		$caesar_c = $f[$j];
		for ($p=0;$p<strlen( $caesar_c );$p++){
			$n=ord($caesar_c[$p]); //merubah karakter menjadi ASCII
			$enc2= $enc.chr(encRSA($n));
		}
	*/
	?>
	
	<div class="container">
		<h1>Hasil - Enkripsi</h1>
		<hr>
		<form action="dekripsi_act.php" method="post" data-ajax="false" class="ui-body ui-body-a ui-corner-all">
			
			<label for="basic">Plainteks :</label>
			<textarea class="form-control" name="ciper" id="textarea-a"><?php echo $kalimat; ?></textarea>

			<label for="basic">Vigenere :</label>
			<textarea class="form-control" name="ciper" id="textarea-a"><?php echo $vigenere; ?></textarea>
			
			<label for="basic">Caesar :</label>
			<textarea class="form-control" name="ciper" id="textarea-a"><?php for ($k = 0; $k < strlen($kalimat); $k++) {
			echo $c[$k];} ?></textarea>
			
			<label for="basic">RSA :</label>
			<textarea class="form-control" name="ciper" id="textarea-a"><?php echo $enc ?></textarea>
						
			
<!--			<label for="basic">Masukkan Kunci :</label>
			<textarea class="form-control" name="kunci" id="textarea-a"><?php echo $kunci; ?></textarea><br>-->
			<br>
			<input type="submit" class="btn btn-success" value=" Decrypt" data-theme="a">
		</form>
	</div>

	
</body>
</html>