<?php 
$con = mysqli_connect("localhost", "root", "admin", "usuarios") or die("Error al conectar a la base de datos!");

if(!isset($_GET["query"])){
	?>

	<div class="row">
		<div class="col-xs-12">
			<div class="breadcrumb">
				<div class="btn-group">
					<button class="btn btn-secondary btn-sm"><i class="fa fa-th-list"></i></button>
					<button class="btn btn-secondary btn-sm active"><i class="fa fa-th"></i></button>
				</div>
				&nbsp;
				<span><b>Ultimos anuncios</b></span>
				<div class="float-xs-right">
					<div class="dropdown sort">
						<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Ordenar por
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="dropdown-item" href="#">Categoria</a>
							<a class="dropdown-item" href="#">Precio alto</a>
							<a class="dropdown-item" href="#">Precio bajo</a>
							<a class="dropdown-item" href="#">Fecha</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<?php		
		$sql = "SELECT * FROM anuncios WHERE desactivado!='si' ORDER BY id DESC";
		foreach ($con->query($sql) as $row) {
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<?php

//APARTAMENTOS
}else if($_GET["query"] == "Apartamentos"){
	$page = "Apartamento";
	?>
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Apartamentos</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}else if($_GET["query"] == "Login"){

	?>
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Iniciar Sesion</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">		
			<?php 

			if(isset($_GET["RegistroExitoso"]) && $_GET["RegistroExitoso"] == 1){
				?>
				<div class="registroExitoso">
					<span><i class="fa fa-check" style="color:#3c7;"></i> <span style="color:#3c7;"><b>Registro exitoso.</b></span> Ahora solo tienes que iniciar sesion!</span>
				</div>
				<?php
			}

			?>	
			<div class="login">	
				<h5>Inicia sesion en tu cuenta!</h5>
				<hr>		
				<form action="./?query=Login" method="POST">
					<label>Correo electronico:</label>
					<input type="text" class="form-control" placeholder="Ingresa tu correo electronico" name="emailLogin" id="emailLogin">
					<br>
					<label>Contraseña:</label>
					<input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="passwordLogin" id="passwordLogin">
					<br>
					<input type="checkbox" checked="true" id="remember">
					<label for="remember">Recordarme</label>
					<br>
					<button class="btn" type="submit" name="submitLogin" id="submit">Iniciar sesion</button>
					<br><br>
					<div class="bot">
						<span>¿No tienes una cuenta? <a href="./?query=Signup">Registrate</a></span>
						<br>
						<span><a href="#">¿Olvidaste tu contraseña?</a></span>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php

}else if($_GET["query"] == "Signup"){
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Crear nueva cuenta</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">			
			<div class="register">
				<h5>Registrate ahora!</h5>
				<hr>
				<form action="?query=Signup" method="post">
					<label>Cedula</label>
					<input type="text" class="form-control" placeholder="Inserta tu cedula" name="cedulaRegistro">
					<br>
					<label>Correo</label>
					<input type="text" class="form-control" placeholder="Inserta tu correo" name="emailRegistro">
					<br>
					<label>Contraseña</label>
					<input type="password" class="form-control" placeholder="Inserta tu contraseña" name="passwordRegistro">
					<br>
					<label>Nombre</label>
					<input type="text" class="form-control" placeholder="Inserta tu nombre" name="nombreRegistro">
					<br>
					<label>Apellido</label>
					<input type="text" class="form-control" placeholder="Inserta tu apellido" name="apellidoRegistro">
					<br>
					<label>Telefono</label>
					<input type="text" class="form-control" placeholder="Inserta tu telefono" name="telefonoRegistro">
					<br>
					<label>Celular</label>
					<input type="text" class="form-control" placeholder="Inserta tu celular" name="celularRegistro">
					<br>
					<label>Fax</label>
					<input type="text" class="form-control" placeholder="Inserta tu Fax" name="faxRegistro">
					<br>
					<label>Mas informacion</label>
					<input type="text" class="form-control" placeholder="Mas informacion" name="masInfoRegistro">
					<select name="esAdmin" id="esAdmin" hidden="true">
						<option value="no" selected="true">no</option>
					</select>
					<br>
					<div class="pl" style="overflow: auto;">
						<div class="float-xs-left">
							<span>Al hacer click en <b>Registrarme</b> aceptas los <a href="#">Terminos</a> y <a href="#">Condiciones.</a></span>
						</div>
						<div class="float-xs-right">
							<button class="btn" name="submitRegistro" type="submit">Registrarme</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php

//PENTHOUSE
}else if($_GET["query"] == "Penthouse"){
	$page = "Penthouse";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Penthouse</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php

//CASAS
}else if($_GET["query"] == "Casas"){
	$page = "Casas";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Casas</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<?php
}

//VILLAS
else if($_GET["query"] == "Villas"){
	$page = "Villas";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Villas</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//LOCALES COMERCIALES
else if($_GET["query"] == "Locales_Comerciales"){
	$page = "Locales Comerciales";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Locales Comerciales</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//OFICINAS
else if($_GET["query"] == "Oficinas"){
	$page = "Oficinas";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Oficinas</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//SOLARES
else if($_GET["query"] == "Solares"){
	$page = "Solares";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Solares</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//FINCAS
else if($_GET["query"] == "Fincas"){
	$page = "Fincas";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Fincas</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//HOTELES
else if($_GET["query"] == "Hoteles"){
	$page = "Hoteles";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Hoteles</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//EDIFICIOS COMPLETOS
else if($_GET["query"] == "Edificios_Completos"){
	$page = "Edificios Completos";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Edificios completos</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//PROYECTOS TURISTICOS
else if($_GET["query"] == "Proyectos_Turisticos"){
	$page = "Proyectos Turisticos";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Proyectos turisticos</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//NAVES
else if($_GET["query"] == "Naves"){
	$page = "Naves";
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Naves</span>
				</div>
			</ol>
		</div>
	</div>
	<div class="row">
		<?php 
		$sql = "SELECT * FROM anuncios WHERE categoria='$page' AND desactivado!='si'";
		foreach($con->query($sql) as $row){
			?>
			<div class="col-xs-4">
				<div class="product">
					<a href="view.php?id=<?php echo $row["id"]; ?>"><img src="<?php echo $row['img1']; ?>" alt="img"></a>
					<div class="product-block">
						<div class="product-name"><a href="view.php?id=<?php echo $row["id"]; ?>"><?php echo $row["titulo"]; ?></a></div>
						<div class="product-price">$RD<?php echo number_format($row["precio"]); ?>.00</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php
}

//PUBLICAR ANUNCIO
else if($_GET["query"] == "Publicar"){
	if(!isset($_SESSION["id"])){
		header("Location:./?query=Login");
	}
	?>	
	<div class="row">
		<div class="col-xs-12">
			<ol class="breadcrumb">
				<div class="container">
					<a class="breadcrumb-item" href="./">INMOBITLA</a>
					<span class="breadcrumb-item active">Publicar anuncio</span>
				</div>
			</ol>
		</div>
	</div>
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
			<form action="./?query=Publicar" method="POST" enctype="multipart/form-data">
				<div class="pasos paso1">
					<h5>Informacion del anuncio</h5>
					<hr>					
					<label>Titulo</label>
					<input type="text" class="form-control" placeholder="Insertar titulo" name="titulo">
					<br>
					<label>Direccion</label>
					<input type="text" class="form-control" placeholder="Insertar direccion" name="direccion">
					<br>
					<label>Categoria</label>
					<select name="categoria" id="categoria" class="form-control">
						<option value="0" hidden="true">Selecciona una categoria</option>
						<?php 

						$sql600 = "SELECT * FROM categorias ORDER BY id ASC";
						foreach($con->query($sql600) as $row600){
							?>
							<option value="<?php echo $row600['nombre']; ?>"><?php echo $row600['nombre']; ?></option>
							<?php
						}

						?>
					</select>					
					<br>
					<label>Precio</label>
					<input type="text" class="form-control" placeholder="Insertar precio" name="precio">
					<br>
					<label>Accion</label>
					<select name="accion" id="accion" class="form-control">
						<option value="0">Selecciona una accion</option>
						<option value="Vender">Vender</option>
						<option value="Alquilar">Alquilar</option>
					</select>
					<br>
					<label>Descripcion</label>
					<textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripcion" class="form-control"></textarea>
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
										Browse&hellip; <input type="file" style="display: none;" name="img1">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 2-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img2">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 3-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img3">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 4-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img4">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 5-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img5">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>
						</div>

						<div class="col-xs-6">

							<!--IMAGEN 6-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img6">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 7-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img7">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 8-->				
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img8">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 9-->					
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img9">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
							</div>

							<br>

							<!--IMAGEN 10-->					
							<div class="input-group">
								<label class="input-group-btn">
									<span class="btn btn-primary">
										Browse&hellip; <input type="file" style="display: none;" name="img10">
									</span>
								</label>
								<input type="text" class="form-control" readonly>
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
							<input type="text" name="ubicacion" class="ubicacion" hidden="true" value="">
							<input type="text" name="lat" class="lat" hidden="true" value="">
							<input type="text" name="lng" class="lng" hidden="true" value="">
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
							<p>Ahora solo tienes que dar click en <b>PUBLICAR</b> para publicar tu anuncio. 
								<br>Puedes volver atras para <b>editar</b> tu anuncio si lo deseas.</p>
								<input type="text" class="usuario_id_numero" name="id_usuario" hidden="true">							
								<br>
								<div class="float-xs-right">
									<button class="btn volver4" type="button">Volver</button>
									<button class="btn boton-publicar" type="submit" name="submit">Publicar</button>
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
		<?php
	}else if($_GET["query"] == "MisAnuncios"){

		if(isset($_SESSION["id"])){
			$ID = $_SESSION["id"];
		}else{
			header("Location:./?query=Login");
		}
		?>	
		<div class="row">
			<div class="col-xs-12">
				<ol class="breadcrumb">
					<div class="container">
						<a class="breadcrumb-item" href="./">INMOBITLA</a>
						<span class="breadcrumb-item active">Mis anuncios</span>
						<div class="float-xs-right">
							<div class="dropdown sort">
								<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Ordenar por
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Categoria</a>
									<a class="dropdown-item" href="#">Precio alto</a>
									<a class="dropdown-item" href="#">Precio bajo</a>
									<a class="dropdown-item" href="#">Fecha</a>
								</div>
							</div>
						</div>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="row">
					<?php 					

					$sql40 = "SELECT * FROM anuncios WHERE id_usuario='$ID'";
					foreach($con->query($sql40) as $row40){
						if($row40["desactivado"]!="si"){
							?>
							<div class="col-xs-4" style="margin-bottom: 1.5rem;">
								<div class="product">
									<a href="view.php?id=<?php echo $row40["id"]; ?>"><img src="<?php echo $row40['img1']; ?>" alt="img"></a>
									<div class="product-block">
										<div class="product-name"><a href="view.php?id=<?php echo $row40["id"]; ?>"><?php echo $row40["titulo"]; ?></a></div>
										<div class="product-price">$RD<?php echo number_format($row40["precio"]); ?>.00</div>
									</div>
									<div class="product-bot" style="overflow: auto;display: flex;align-items: center;justify-content: center;padding: 0.5rem 0rem 1rem;">
										<a href="edit_anuncio.php?id=<?php echo $row40['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
										&nbsp;
										<a href="desactivarAnuncio.php?id=<?php echo $row40['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-power-off"></i> Desactivar</a>
									</div>
								</div>
							</div>
							<?php
						}else{
							?>
							<div class="col-xs-4" style="margin-bottom: 1.5rem;">
								<div class="product">
									<a href="view.php?id=<?php echo $row40["id"]; ?>"><img src="<?php echo $row40['img1']; ?>" alt="img"></a>
									<div class="product-block">
										<div class="product-name"><a href="view.php?id=<?php echo $row40["id"]; ?>"><?php echo $row40["titulo"]; ?></a></div>
										<div class="product-price">$RD<?php echo number_format($row40["precio"]); ?>.00</div>
									</div>
									<div class="product-bot" style="overflow: auto;display: flex;align-items: center;justify-content: center;padding: 0.5rem 0rem 1rem;">
										<a href="edit_anuncio.php?id=<?php echo $row40['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Editar</a>
										&nbsp;
										<a href="activarAnuncio.php?id=<?php echo $row40['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-power-off"></i> Activar</a>
									</div>
								</div>
							</div>
							<?php
						}
					}

					?>
				</div>
			</div>
		</div>
		<?php
	}

	?>