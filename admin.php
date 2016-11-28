<?php session_start(); ?>
<?php $con = mysqli_connect("localhost", "root", "admin", "usuarios") or die("Error al conectar a la base de datos!"); ?>

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
						<span class="breadcrumb-item active">Bienvenido al Modo Admin</span>
					</div>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header" style="background-color: #E45740;">
						<ul class="nav nav-tabs card-header-tabs float-xs-left">
							<li class="nav-item">
								<a class="nav-link active" href="#tab1default" data-toggle="tab">Usuarios</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab2default" data-toggle="tab">Categorias</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab3default" data-toggle="tab">Acciones</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#tab4default" data-toggle="tab">Anuncios</a>
							</li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="tab1default">
								<br>
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<h5 style="text-align: left;">Usuarios estandar</h5>											
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<a href="crearUsuarioEstandar.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar</a>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<table class="table">
														<thead>
															<tr class="thead-default">
																<th>ID</th>
																<th>Nombre</th>
																<th>Apellido</th>
																<th>Cedula</th>
																<th>Email</th>
																<th>Telefono</th>
																<th>Celular</th>
																<th>Fax</th>
                                                                                                                                <th>Accion</th>
															</tr>
														</thead>
														<tbody>
															<?php 

															$sql125 = "SELECT * FROM users WHERE admin!='si' ORDER BY id DESC";
															foreach($con->query($sql125) as $row125){
																?>
																<tr>
																	<td><?php echo $row125["id"]; ?></td>
																	<td><?php echo $row125["nombre"]; ?></td>
																	<td><?php echo $row125["apellido"]; ?></td>
																	<td><?php echo $row125["cedula"]; ?></td>
																	<td><?php echo $row125["correo"]; ?></td>
																	<td><?php echo $row125["telefono"]; ?></td>
																	<td><?php echo $row125["celular"]; ?></td>
																	<td><?php echo $row125["fax"]; ?></td>
																	<td>
																		<a href="eliminarUsuario.php?id=<?php echo $row125['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</a>
																	</td>
																</tr>
																<?php
															}

															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<h5 style="text-align: left;">Usuarios administradores</h5>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<a href="crearUsuarioAdministrador.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar</a>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<table class="table">
														<thead>
															<tr class="thead-default">
																<th>ID</th>
																<th>Nombre</th>
																<th>Apellido</th>
																<th>Cedula</th>
																<th>Email</th>
																<th>Telefono</th>
																<th>Celular</th>
																<th>Fax</th>
                                                                                                                                <th>Accion</th>
															</tr>
														</thead>
														<tbody>
															<?php 

															$sql120 = "SELECT * FROM users WHERE admin='si' ORDER BY id DESC";
															foreach($con->query($sql120) as $row120){
																?>
																<tr>
																	<td><?php echo $row120["id"]; ?></td>
																	<td><?php echo $row120["nombre"]; ?></td>
																	<td><?php echo $row120["apellido"]; ?></td>
																	<td><?php echo $row120["cedula"]; ?></td>
																	<td><?php echo $row120["correo"]; ?></td>
																	<td><?php echo $row120["telefono"]; ?></td>
																	<td><?php echo $row120["celular"]; ?></td>
																	<td><?php echo $row120["fax"]; ?></td>
																	<td>
																		<a href="eliminarUsuario.php?id=<?php echo $row120['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</a>
																	</td>
																</tr>
																<?php
															}

															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab2default">
								<br>
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<h5 style="text-align: left;">Categorias</h5>
											<hr>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<a href="crearCategoria.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar</a>
										</div>
									</div>
									<br>
									<div class="row">
										<div class="col-xs-12">
											<table class="table">
												<thead>
													<tr class="thead-default">
														<th>ID</th>
														<th>Nombre</th>
														<th>Accion</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$sql100 = "SELECT * FROM categorias ORDER BY id ASC";
													foreach($con->query($sql100) as $row100){
														?>
														<tr>
															<td><?php echo $row100["id"]; ?></td>
															<td><?php echo $row100["nombre"]; ?></td>
															<td>
																<a href="eliminarCategoria.php?id=<?php echo $row100['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</a>
															</td>
														</tr>
														<?php
													}

													?>
												</tbody>
											</table>											
										</div>
									</div>
									<br>
								</div>
							</div>
							<div class="tab-pane fade" id="tab3default">
								<br>
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<h5>Acciones</h5>
											<hr>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<a href="crearAccion.php" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Agregar</a>
												</div>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-xs-12">
												<div class="container">
													<table class="table">
														<thead>
															<tr class="thead-default">
																<th>ID</th>
																<th>Nombre</th>
																<th>Accion</th>
															</tr>
														</thead>
														<tbody>
															<?php 

															$sql101 = "SELECT * FROM accion ORDER BY id ASC";
															foreach($con->query($sql101) as $row101){
																?>
																<tr>
																	<td><?php echo $row101["id"]; ?></td>
																	<td><?php echo $row101["nombre"]; ?></td>
																	<td>
																		<a href="eliminarAccion.php?id=<?php echo $row101['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</a>
																	</td>
																</tr>
																<?php
															}

															?>
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
								<br>
								<br>
								<br>
								<br>
							</div>
							<div class="tab-pane fade" id="tab4default">
								<br>
								<div class="container">
									<div class="row">
										<div class="col-xs-12">
											<h5>Anuncios</h5>
											<hr>
											<table class="table">
												<thead>
													<tr class="thead-default">
														<th>ID</th>
														<th>Titulo</th>
														<th>Direccion</th>
														<th>Categoria</th>
														<th>Precio</th>
														<th>Accion</th>
														<th>Descripcion</th>
														<th>Accion</th>
													</tr>
												</thead>
												<tbody>
													<?php 

													$sql105 = "SELECT * FROM anuncios ORDER BY id DESC";
													foreach($con->query($sql105) as $row105){
														?>
														<tr>
															<td><?php echo $row105["id"]; ?></td>
															<td><?php echo $row105["titulo"]; ?></td>
															<td><?php echo $row105["direccion"]; ?></td>
															<td><?php echo $row105["categoria"]; ?></td>
															<td><?php echo $row105["precio"]; ?></td>
															<td><?php echo $row105["accion"]; ?></td>
															<td><?php echo $row105["descripcion"]; ?></td>
															<td>
																<a href="eliminarAnuncio.php?id=<?php echo $row105['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Eliminar</a>
															</td>
														</tr>
														<?php
													}

													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<?php require 'includes/footer.php'; ?>
</body>
</html>		