<?php session_start(); ?>
<?php $con = mysqli_connect("sql301.epizy.com", "epiz_19228730", "isocrates", "epiz_19228730_usuarios") or die("Error al conectar a la base de datos!"); ?>

<?php 

	
	$usuario_id = $_GET["id"];

	$sql12 = "DELETE FROM users WHERE id='$usuario_id'";
	$query12 = mysqli_query($con, $sql12);

	if($query12){
		header("Location:admin.php");
	}


?>