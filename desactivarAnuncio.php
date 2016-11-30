<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios"); ?>

<?php 

	
	$anuncio_id = $_GET["id"];

	$sql18 = "UPDATE anuncios SET desactivado='si' WHERE id='$anuncio_id'";
	$query18 = mysqli_query($con, $sql18);

	if($query18){
		header("Location:./?query=MisAnuncios");
	}


?>