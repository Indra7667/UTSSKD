<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "v3420040_skd";

$conn = new mysqli($hostname, $username, $password, $database);

error_reporting(0);

					/*RSA*/
function encRSA($M){ 
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

if ($conn->connect_error) {
    die("Database tidak terkoneksi" . $conn->connect_error);
}

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){

    global $conn;

				
		/*-----RSA ENCRYPTION-----*/
	$R_name= strtolower( $data["nama"]);
for ($l=0;$l<strlen($R_name);$l++){
	$m=ord($R_name[$l]); //merubah karakter menjadi ASCII
	$enc= $enc.chr(encRSA($m));
}
		/*-----CAESAR ENCRYPTION for email-----*/
	$key = "2"; 
	$C_mail= mysqli_escape_string($conn, $data["email"]);
	for ($y = 0; $y < strlen($C_mail); $y++) {
	$kode[$y] = ord($C_mail[$y]); 
	$b[$y] = ($kode[$y] + $key) % 256; 
	$c[$y] = chr($b[$y]);}
	$caesar = '';
	for ($z = 0; $z < strlen($C_mail); $z++) {
		$caesar = $caesar . $c[$z];
	}
		/*-----CAESAR ENCRYPTION for username-----*/	
	$key = "2"; 
	$C_uName= strtolower($data["username"]);
	for ($x = 0; $x < strlen($C_uName); $x++) {
	$kode[$x] = ord($C_uName[$x]); 
	$d[$x] = ($kode[$x] + $key) % 256; 
	$e[$x] = chr($d[$x]);}
	$Ucaesar = '';
	for ($w = 0; $w < strlen($C_mail); $w++) {
		$Ucaesar = $Ucaesar . $e[$w];
	}
	
	
    $nama = $enc;
    $username = $Ucaesar;
    $email = $caesar;
    $password = mysqli_escape_string($conn, $data["password"]);
    $password2 = mysqli_escape_string($conn, $data["password2"]);

    $resultresult = mysqli_query($conn, "SELECT username FROM mahasiswa HERE username = '$username'");
	$hash = $data["password"];									
	$hashpa = hash('md5', $hash);
	


    if (mysqli_fetch_assoc($result)) {
        echo "
                <script>    
                    alert('Username Sudah Terdaftar');
                </script>
            ";

        return false;
    }

    if ($password != $password2) {
        echo "
                <script>
                    alert('Konfirmasi Password Tidak Sama');
                </script>
            ";

        return false;
    } else {
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('','$nama','$username','$email','$hashpa')");

        
        return mysqli_affected_rows($conn);
    }
}

function status(){

    $ket = "Dalam perjalanan";

    return $ket;
}

/*
function rupiah($harga)
{
    $hasil = "Rp. " . number_format($harga, '2', ',', ',');
    return $hasil;
}

function tanggal()
{

    $ket = date("d-m-Y");
    $tgl = $ket;

    return $tgl;
}

function autoresi($data)
{

    global $conn;

    $sql = mysqli_query($conn, "SELECT max(id) as 'maxID' from `order`");
    $data = mysqli_fetch_array($sql);

    $kode = $data['maxID'];

    $kode++;
    $kode <= 20;

    $ket = "FDM";
    $ket2 = date("Ymd");
    $kodeauto = $ket . $ket2 . sprintf("%01s", $kode);

    return $kodeauto;
}

    
function tambah($data)
{
    global $conn;

    $no_resi = autoresi($data);
    $tgl_transaksi = tanggal();
    $status = status();
    $nama_pengirim = htmlspecialchars($data["nama_pengirim"]);
    $pos_pengirim = htmlspecialchars($data["pos_pengirim"]);
    $asal_pengirim = htmlspecialchars($data["asal_pengirim"]);
    $nomor_pengirim = htmlspecialchars($data["nomor_pengirim"]);
    $alamat_pengirim = htmlspecialchars($data["alamat_pengirim"]);
    $nama_penerima = htmlspecialchars($data["nama_penerima"]);
    $pos_penerima = htmlspecialchars($data["pos_penerima"]);
    $asal_penerima = htmlspecialchars($data["asal_penerima"]);
    $nomor_penerima = htmlspecialchars($data["nomor_penerima"]);
    $alamat_penerima = htmlspecialchars($data["alamat_penerima"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    $berat_barang = htmlspecialchars($data["berat_barang"]);
    $banyak_barang = htmlspecialchars($data["banyak_barang"]);
    $total_transaksi = htmlspecialchars($data["total_transaksi"]);

    $query = "INSERT INTO `order`(`no_resi`, `tgl_transaksi`, `nama_pengirim`, `asal_pengirim`, `alamat_pengirim`, `pos_pengirim`, `nomor_pengirim`, `nama_penerima`, `asal_penerima`, `alamat_penerima`, `pos_penerima`, `nomor_penerima`, `nama_barang`, `berat_barang`, `jenis_barang`, `banyak_barang`, `total_transaksi`, `status`) VALUES ('$no_resi','$tgl_transaksi','$nama_pengirim','$asal_pengirim','$alamat_pengirim','$pos_pengirim','$nomor_pengirim','$nama_penerima','$asal_penerima','$alamat_penerima','$pos_penerima','$nomor_penerima','$nama_barang','$berat_barang','$jenis_barang','$banyak_barang','$total_transaksi','$status')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
    // echo $query;
}

function tambah2($data)
{
    global $conn;

    $no_resi = autoresi($data);
    $tgl_transaksi = tanggal();
    $total_transaksi = htmlspecialchars($data["total_transaksi"]);
    $nama_pengirim = htmlspecialchars($data["nama_pengirim"]);
    $pos_pengirim = htmlspecialchars($data["pos_pengirim"]);
    $asal_pengirim = htmlspecialchars($data["asal_pengirim"]);
    $nomor_pengirim = htmlspecialchars($data["nomor_pengirim"]);
    $alamat_pengirim = htmlspecialchars($data["alamat_pengirim"]);
    $nama_penerima = htmlspecialchars($data["nama_penerima"]);
    $pos_penerima = htmlspecialchars($data["pos_penerima"]);
    $asal_penerima = htmlspecialchars($data["asal_penerima"]);
    $nomor_penerima = htmlspecialchars($data["nomor_penerima"]);
    $alamat_penerima = htmlspecialchars($data["alamat_penerima"]);
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $jenis_barang = htmlspecialchars($data["jenis_barang"]);
    $berat_barang = htmlspecialchars($data["berat_barang"]);
    $banyak_barang = htmlspecialchars($data["banyak_barang"]);

    $query1 = "INSERT INTO `tb_transaksi`(`no_resi`, `tgl_transaksi`, `total_transaksi`) VALUES 
        ('$no_resi','$tgl_transaksi','$total_transaksi')";
    $query2 = "INSERT INTO `tb_pengirim`(`nama_pengirim`, `asal_pengirim`, `alamat_pengirim`, `pos_pengirim`, `nomor_pengirim`) VALUES 
        ('$nama_pengirim','$asal_pengirim','$alamat_pengirim','$pos_pengirim','$nomor_pengirim')";
    $query3 = "INSERT INTO `tb_penerima`(`nama_penerima`, `asal_penerima`, `alamat_penerima`, `pos_penerima`, `nomor_penerima`) VALUES 
        ('$nama_penerima','$asal_penerima','$alamat_penerima','$pos_penerima','$nomor_penerima')";
    $query4 = "INSERT INTO `tb_barang`(`nama_barang`, `berat_barang`, `jenis_barang`, `banyak_barang`) VALUES 
        ('$nama_barang','$berat_barang','$jenis_barang','$banyak_barang')";

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_query($conn, $query3);
    mysqli_query($conn, $query4);

    return mysqli_affected_rows($conn);
}
*/

function ubah5($data){
    global $conn;
    $id = $data["id"];
    $nama = $data["nama"];
    $username = $data["username"];
    $email = $data["email"];
    $query = "UPDATE `mahasiswa` SET nama = '$nama', username = '$username', email = '$email' WHERE id = '$id'
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
