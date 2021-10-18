<html>
<head>
	<title>enkripsi</title>
	<link rel="stylesheet" 
href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<div class="container">
	<h1>UTS membuat enkripsi 3 tingkat</h1>
	<hr>
	<form action="enkripsi_act.php" method="post" data-ajax="false" class="ui-body ui-body-a ui-corner-all">
	<label for="basic">Masukkan Plain Text :</label>
	<textarea class="form-control" name="plain" id="textarea-a"></textarea>
<!--	<label for="basic">Masukkan Kunci :</label>
	<textarea class="form-control" name="kunci" id="textarea-a"></textarea><br>-->
	<br>
	<input type="submit" class="btn btn-success" value=" Encrypt" data-theme="a"> 
	<input type="reset" class="btn btn-primary" value=" Hapus" data-theme="a">
	</form>
</div>
</html>