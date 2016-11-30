<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios"); ?>

<?php 

if(isset($_POST["submit"])){
	$cedula = $_POST["cedula"];
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$telefono = $_POST["telefono"];
	$celular = $_POST["celular"];
	$fax = $_POST["fax"];
	$masInfo = $_POST["masInfo"];
	$esAdmin = $_POST["esAdmin"];

	$sql64 = "INSERT INTO users(nombre, apellido, password, correo, cedula, telefono, celular, fax, mas, admin) VALUES('$nombre', '$apellido', '$password', '$email', '$cedula', '$telefono', '$celular', '$fax', '$masInfo', '$esAdmin')";
	$query64 = mysqli_query($con, $sql64) or die(mysqli_error($con));

	if($query64){					
		header("Location:admin.php");			

	}else{
		echo "<script>alert('Error al agregar el usuario!')</script>";
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
						<span class="breadcrumb-item active">Crear usuario estandar</span>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">				
				<div class="usuarioEstandar">
					<h5>Usuario estandar</h5>
					<hr>
					<form action="crearUsuarioEstandar.php" method="post">
						<label>Cedula</label>
						<input type="text" class="form-control" name="cedula" placeholder="Cedula">
						<br>
						<label>Nombre</label>
						<input type="text" class="form-control" name="nombre" placeholder="Nombre">
						<br>
						<label>Apellido</label>
						<input type="text" class="form-control" name="apellido" placeholder="Apellido">
						<br>
						<label>Email</label>
						<input type="text" class="form-control" name="email" placeholder="Email">
						<br>
						<label>Contraseña</label>
						<input type="password" class="form-control" name="password" placeholder="Contraseña">
						<br>
						<label>Telefono</label>
						<input type="text" class="form-control" name="telefono" placeholder="Telefono">
						<br>
						<label>Celular</label>
						<input type="text" class="form-control" name="celular" placeholder="Celular">
						<br>
						<label>Fax</label>
						<input type="text" class="form-control" name="fax" placeholder="Fax">
						<br>
						<label>Mas Informacion</label>
						<textarea name="masInfo" id="masInfo" cols="30" rows="10" class="form-control" placeholder="Mas informacion"></textarea>
						<select name="esAdmin" id="esAdmin" hidden="true">
							<option value="no" selected="true">no</option>
						</select>
						<br>
						<div class="float-xs-right">
							<a href="admin.php" class="btn">Volver</a>
							<button class="btn" type="submit" name="submit">Registrar usuario estandar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<?php require 'includes/footer.php'; ?>
</body>
</html>