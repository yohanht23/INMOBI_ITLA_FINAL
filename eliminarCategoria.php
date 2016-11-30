<?php session_start(); ?>
<?php $con = mysqli_connect("sql301.epizy.com", "epiz_19228730", "isocrates", "epiz_19228730_usuarios") or die("Error al conectar a la base de datos!"); ?>

<?php 
	
	
	$categoria_id = $_GET["id"];

	$sql13 = "DELETE FROM categorias WHERE id='$categoria_id'";
	$query13 = mysqli_query($con, $sql13);

	if($query13){
		header("Location:admin.php");
	}


?>