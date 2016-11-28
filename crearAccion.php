<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios") or die("Error al conectar a la base de datos!"); ?>

<?php 


if(isset($_POST["submit"])){

	$nombreAccion = $_POST["nombreAccion"];

	$sql99 = "INSERT INTO accion(nombre) VALUES('$nombreAccion')";
	$query99 = mysqli_query($con, $sql99);

	if($query99){					
		header("Location:admin.php");			

	}else{
		echo "<script>alert('Error al agregar la accion!')</script>";
	}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'includes/head_meta.php'; ?>
</head>
<body>
	<?php require 'includes/header_admin.php'; ?>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<div class="container">
						<a class="breadcrumb-item" href="admin.php">Modo Admin</a>
						<span class="breadcrumb-item active">Crear accion</span>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">				
				<div class="crearCategoria">
					<form action="crearAccion.php" method="POST">
						<label>Accion: </label>
						<input type="text" class="form-control" placeholder="Inserta el nombre de la accion" name="nombreAccion">
						<br>
						<div class="float-xs-right">
							<button class="btn" type="submit" name="submit">Guardar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br><br><br><br><br><br>
	<br>
	<br>
	<br>
	<br>
	<?php require 'includes/footer.php'; ?>
</body>
</html>