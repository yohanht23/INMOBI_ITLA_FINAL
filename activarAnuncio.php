<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios") or die("Error al conectar a la base de datos!"); ?>

<?php 

	
	$anuncio_id = $_GET["id"];

	$sql28 = "UPDATE anuncios SET desactivado='no' WHERE id='$anuncio_id'";
	$query28 = mysqli_query($con, $sql28);

	if($query28){
		header("Location:./?query=MisAnuncios");
	}


?>