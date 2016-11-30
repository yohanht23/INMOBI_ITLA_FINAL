<?php 
$UsuarioID = 0;
if(isset($_SESSION["id"])){
	$UsuarioID = $_SESSION["id"];
}
$sql21 = "SELECT nombre FROM users WHERE id='$UsuarioID'";
$query21 = mysqli_query($con, $sql21);
$nombreUsuario = "";
while($row21 = mysqli_fetch_assoc($query21)){
	$nombreUsuario = $row21["nombre"];
}

?>
<header>
	<div class="container">
		<div class="row">
			<div class="col-xs-3">
				<a href="./" class="header-brand">
					<img src="logo.png" alt="">
					INMOBI
					<span class="light">ITLA</span>
				</a>

			</div>
			<div class="col-xs-9">
				<div class="float-xs-right">
					<div class="header-menu">
						<div class="header-menu-item">
							<a href="modo_mapa.php"><i class="fa fa-map-marker"></i> Vista Mapa</a>
						</div>
						<div class="header-menu-item">
							<div class="dropdown">
								<a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $nombreUsuario; ?></a>
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="#">Perfil</a>
									<a class="dropdown-item" href="#">Ayuda</a>
									<a class="dropdown-item" href="includes/logout.php">Cerrar sesion</a>
								</div>
							</div>							
						</div>
						<div class="header-menu-item">
							<a href="./?query=MisAnuncios"><i class="fa fa-list"></i> Mis anuncios</a>
						</div>
						<div class="header-menu-item">
							<a href="./?query=Publicar" class="btn btn-danger"><i class="fa fa-plus"></i> PUBLICAR ANUNCIO</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>