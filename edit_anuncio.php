<?php 
session_start();

$con = mysqli_connect("localhost", "root", "admin", "usuarios");

if(isset($_GET["id"])){
	$theID = $_GET["id"];
}

if(isset($_POST["editarSubmit"])){

	$newTitulo = $_POST["editarTitulo"];
	$newDireccion = $_POST["editarDireccion"];
	$newCategoria = $_POST["editarCategoria"];
	$newPrecio = $_POST["editarPrecio"];
	$newAccion = $_POST["editarAccion"];
	$newDescripcion = $_POST["editarDescripcion"];

	$newUbicacion = $_POST["editarUbicacion"];
	$lat = $_POST["lat"];
	$lng = $_POST["lng"];

	$target = "includes/uploads/";
	$newImg1 = $target . basename($_FILES['editarImg1']['name']);
	$newImg2 = $target . basename($_FILES['editarImg2']['name']);
	$newImg3 = $target . basename($_FILES['editarImg3']['name']);
	$newImg4 = $target . basename($_FILES['editarImg4']['name']);
	$newImg5 = $target . basename($_FILES['editarImg5']['name']);
	$newImg6 = $target . basename($_FILES['editarImg6']['name']);
	$newImg7 = $target . basename($_FILES['editarImg7']['name']);
	$newImg8 = $target . basename($_FILES['editarImg8']['name']);
	$newImg9 = $target . basename($_FILES['editarImg9']['name']);
	$newImg10 = $target . basename($_FILES['editarImg10']['name']);

	//Subiendo imagenes
	move_uploaded_file($_FILES['editarImg1']['tmp_name'], $newImg1);
	move_uploaded_file($_FILES['editarImg2']['tmp_name'], $newImg2);
	move_uploaded_file($_FILES['editarImg3']['tmp_name'], $newImg3);
	move_uploaded_file($_FILES['editarImg4']['tmp_name'], $newImg4);
	move_uploaded_file($_FILES['editarImg5']['tmp_name'], $newImg5);
	move_uploaded_file($_FILES['editarImg6']['tmp_name'], $newImg6);
	move_uploaded_file($_FILES['editarImg7']['tmp_name'], $newImg7);
	move_uploaded_file($_FILES['editarImg8']['tmp_name'], $newImg8);
	move_uploaded_file($_FILES['editarImg9']['tmp_name'], $newImg9);
	move_uploaded_file($_FILES['editarImg10']['tmp_name'], $newImg10);

	$sql61 = "UPDATE anuncios SET titulo='$newTitulo', direccion='$newDireccion', categoria='$newCategoria', precio='$newPrecio', accion='$newAccion', descripcion='$newDescripcion', ubicacion='$newUbicacion', lat='$lat', lng='$lng', img1='$newImg1', img2='$newImg2', img3='$newImg3', img4='$newImg4', img5='$newImg5', img6='$newImg6', img7='$newImg7', img8='$newImg8', img9='$newImg9', img10='$newImg10' WHERE id='$theID'";
	$query61 = mysqli_query($con, $sql61);
	if($query61){
		header("Location:./");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php require 'includes/head_meta.php'; ?>
</head>
<body>
	<span class="h_id_usuario" id="h_id_usuario" hidden="true"></span>
	<?php 
	if(isset($_SESSION["id"])){
		require 'includes/header_user.php';
	}else{
		require 'includes/header_no_user.php';
	}
	?>
	<br>
	<div class="container">	
		<div class="row">
			<div class="col-xs-3">
				<?php require 'includes/categories.php'; ?>
			</div>
			<div class="col-xs-9">
				<div class="row">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<div class="container">
								<a class="breadcrumb-item" href="./">INMOBITLA</a>
								<span class="breadcrumb-item active">Editar anuncio</span>
							</div>
						</ol>
					</div>
				</div>
				<?php 

				$myID = $_GET["id"];
				$sql50 = "SELECT * FROM anuncios WHERE id='$myID'";
				$query50 = mysqli_query($con, $sql50);
				while($row50 = mysqli_fetch_assoc($query50)){
					$editarTitulo = $row50["titulo"];
					$editarDireccion = $row50["direccion"];
					$editarCategoria = $row50["categoria"];
					$editarPrecio = $row50["precio"];
					$editarAccion = $row50["accion"];
					$editarDescripcion = $row50["descripcion"];
					$editarUbicacion = $row50["ubicacion"];

					$editarImg1 = $row50["img1"];
					$editarImg2 = $row50["img2"];
					$editarImg3 = $row50["img3"];
					$editarImg4 = $row50["img4"];
					$editarImg5 = $row50["img5"];
					$editarImg6 = $row50["img6"];
					$editarImg7 = $row50["img7"];
					$editarImg8 = $row50["img8"];
					$editarImg9 = $row50["img9"];
					$editarImg10 = $row50["img10"];

					$editarLat = $row50["lat"];
					$editarLng = $row50["lng"];
				}

				?>
				<div class="row">
					<div class="col-xs-12">
						<div class="publicar-anuncio">
							<div class="ui five top attached steps">
								<div class="step step1 active">
									<i class="fa fa-info icon"></i>
									<div class="content">
										<div class="title">Informacion</div>
									</div>
								</div>
								<div class="disabled step step2">
									<i class="fa fa-user icon"></i>
									<div class="content">
										<div class="title">Vendedor</div>
									</div>
								</div>
								<div class="disabled step step3">
									<i class="fa fa-picture-o icon"></i>
									<div class="content">
										<div class="title">Imagenes</div>
									</div>
								</div>
								<div class="disabled step step4">
									<i class="fa fa-map-marker icon"></i>
									<div class="content">
										<div class="title">Ubicacion</div>
									</div>
								</div>
								<div class="disabled step step5">
									<i class="fa fa-check icon"></i>
									<div class="content">
										<div class="title">Terminado</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">			
						<form action="edit_anuncio.php?id=<?php echo $_GET['id']; ?>" method="POST" enctype="multipart/form-data">
							<div class="pasos paso1">
								<h5>Informacion del anuncio</h5>
								<hr>					
								<label>Titulo</label>
								<input type="text" class="form-control" placeholder="Insertar titulo" name="editarTitulo" value="<?php echo $editarTitulo; ?>">
								<br>
								<label>Direccion</label>
								<input type="text" class="form-control" placeholder="Insertar direccion" name="editarDireccion" value="<?php echo $editarDireccion; ?>">
								<br>
								<label>Categoria</label>
								<select name="editarCategoria" id="editarCategoria" class="form-control">
									<option value="0" hidden="true" selected="true">Selecciona una categoria</option>
									<option value="Apartamento"  <?php if($editarCategoria == "Apartamento"){echo "selected";} ?> >Apartamento</option>
								</select>
								<br>
								<label>Precio</label>
								<input type="text" class="form-control" placeholder="Insertar precio" name="editarPrecio" value="<?php echo $editarPrecio; ?>">
								<br>
								<label>Accion</label>
								<select name="editarAccion" id="editarAccion" class="form-control">
									<option value="0" hidden="true">Selecciona una accion</option>
									<option value="Vender" <?php if($editarAccion == "Vender"){echo "selected";} ?>>Vender</option>
									<option value="Alquilar" <?php if($editarAccion == "Alquilar"){echo "selected";} ?>>Alquilar</option>
								</select>
								<br>
								<label>Descripcion</label>
								<textarea name="editarDescripcion" id="editarDescripcion" cols="30" rows="10" placeholder="Descripcion" class="form-control"><?php echo $editarDescripcion; ?></textarea>
								<br>
								<div class="pl" style="overflow:auto;">
									<div class="float-xs-right">
										<button class="btn goStep2" type="button">Siguiente</button>
									</div>
								</div>
							</div>
							<div class="pasos paso2">
								<h5>Informacion del vendedor</h5>
								<hr>					
								<label>Nombre</label>
								<input type="text" class="form-control" placeholder="Nombre">
								<br>
								<label>Apellido</label>
								<input type="text" class="form-control" placeholder="Apellido">
								<br>
								<label>Correo electronico</label>
								<input type="text" class="form-control" placeholder="Correo electronico">
								<br>
								<label>Celular</label>
								<input type="text" class="form-control" placeholder="Celular">
								<br>
								<div class="pl" style="overflow:auto;">
									<div class="float-xs-right">
										<button class="btn volver1" type="button">Volver</button>
										<button class="btn goStep3" type="button">Siguiente</button>
									</div>
								</div>
							</div>
							<div class="pasos paso3">
								<h5>Imagenes del anuncio</h5>
								<hr>

								<div class="row">
									<div class="col-xs-12">
										<label style="margin-bottom: 10px;">Puedes subir hasta 10 fotos. Utilice una imagen real, no catalogos.</label>	
									</div>
								</div>
								<div class="row">	
									<div class="col-xs-6">

										<!--IMAGEN 1-->											
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg1" value="<?php echo $editarImg1; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg1!='includes/uploads/'){echo $editarImg1;} ?>">
										</div>

										<br>

										<!--IMAGEN 2-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg2" value="<?php echo $editarImg2; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg2!='includes/uploads/'){echo $editarImg2;} ?>">
										</div>

										<br>

										<!--IMAGEN 3-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg3" value="<?php echo $editarImg3; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg3!='includes/uploads/'){echo $editarImg3;} ?>">
										</div>

										<br>

										<!--IMAGEN 4-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg4" value="<?php echo $editarImg4; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg4!='includes/uploads/'){echo $editarImg4;} ?>">
										</div>

										<br>

										<!--IMAGEN 5-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg5" value="<?php echo $editarImg5; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg5!='includes/uploads/'){echo $editarImg5;} ?>">
										</div>
									</div>

									<div class="col-xs-6">

										<!--IMAGEN 6-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg6" value="<?php echo $editarImg6; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg6!='includes/uploads/'){echo $editarImg6;} ?>">
										</div>

										<br>

										<!--IMAGEN 7-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg7" value="<?php echo $editarImg7; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg7!='includes/uploads/'){echo $editarImg7;} ?>">
										</div>

										<br>

										<!--IMAGEN 8-->				
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg8" value="<?php echo $editarImg8; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg8!='includes/uploads/'){echo $editarImg8;} ?>">
										</div>

										<br>

										<!--IMAGEN 9-->					
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg9" value="<?php echo $editarImg9; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg9!='includes/uploads/'){echo $editarImg9;} ?>">
										</div>

										<br>

										<!--IMAGEN 10-->					
										<div class="input-group">
											<label class="input-group-btn">
												<span class="btn btn-primary">
													Browse&hellip; <input type="file" style="display: none;" name="editarImg10" value="<?php echo $editarImg10; ?>">
												</span>
											</label>
											<input type="text" class="form-control" readonly value="<?php if($editarImg10!='includes/uploads/'){echo $editarImg10;} ?>">
										</div>
									</div>
								</div>

								<br>

								<div class="pl" style="overflow:auto;">
									<div class="float-xs-right">
										<button class="btn volver2" type="button">Volver</button>
										<button class="btn goStep4" type="button">Siguiente</button>
									</div>
								</div>
							</div>

							<div class="pasos paso4">
								<div class="row">
									<div class="col-xs-12">
										<h5>Ubicacion del anuncio</h5>
										<hr>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>Selecciona la ubicacion de tu anuncio:</label>
										<input id="pac-input" class="controls" type="text"
										placeholder="Enter a location">
										<div id="map"></div>
										<br>
										<div class="pl" style="overflow:auto;">
											<div class="float-xs-right">
												<button class="btn volver3" type="button">Volver</button>
												<button class="btn goStep5" type="button">Siguiente</button>
											</div>
										</div>
										<input type="text" name="editarUbicacion" class="ubicacion" hidden="true" value="">
										<input type="text" name="lat" class="lat" hidden="true" value="<?php echo $editarLat; ?>">
										<input type="text" name="lng" class="lng" hidden="true" value="<?php echo $editarLng; ?>">
									</div>
								</div>
							</div>

							<div class="pasos paso5">
								<div class="row">
									<div class="col-xs-12">
										<h5><i class="fa fa-thumbs-up"></i> Terminado</h5>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-xs-12">
										<p>¡Bien hecho!</p>
										<p>Ahora solo tienes que dar click en <b>GUARDAR</b> para publicar tu anuncio. 
											<br>Puedes volver atras para <b>editar</b> tu anuncio si lo deseas.</p>
											<input type="text" class="usuario_id_numero" name="id_usuario" hidden="true">							
											<br>
											<div class="float-xs-right">
												<button class="btn volver4" type="button">Volver</button>
												<button class="btn boton-publicar" type="submit" name="editarSubmit">Guardar</button>
											</div>
										</div>
									</div>
									<script>
										$(".usuario_id_numero").val($(".h_usuario_id").val());
									</script>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>
		<br>
		<?php require 'includes/footer.php'; ?>

		<script src="includes/js/script.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCH7BUCoBIt3AFY6_ertXOw-Hh60bVeFHw&libraries=places&callback=initMap"
		async defer></script>
	</body>
	</html>